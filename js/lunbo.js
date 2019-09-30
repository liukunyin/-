function fnSteam(data){
        var wrap = $("#wrap");
        for(var i = 0;i < data.length;i++){
            var newgameUrl = $("#tem").clone(true);//.clone生成副本
            newgameUrl.addClass('gameUrl');//加类名
            $("#prev").before(newgameUrl);//在被选元素前插入内容
            newgameUrl.attr("id","");//设置备选元素的值
            // 游戏网址链接
            newgameUrl.attr("href",data[i].url);
            newgameUrl.find('.left').html('<img src='+data[i].imgUrl[0]+'>');//遍历所有元素设置内容
            // 游戏名
            newgameUrl.find('.gameName').html(data[i].name);
            // 从后台获取图片加载到页面
            for(var j = 0;j < data[i].imgUrl.length;j++){
                newgameUrl.find('.gameImg').find('li').eq(j).html('<img src='+data[i].imgUrl[j]+'>');//eq选择制定index的参数
                newgameUrl.find('.aside_img').find('li').eq(j).html('<img src='+data[i].imgUrl[j]+'>');
            }
            // 价格 折扣率  折扣后价格
            if(!data[i].isSale){
                newgameUrl.find('.gamePrice').find('span').eq(2).html('￥'+data[i].price);
            }else{
                if(data[i].discount != 0){
                    newgameUrl.find('.gamePrice').find('.discount').css({display:"inline-block"});
                }else{
                    newgameUrl.find('.gamePrice').find('.discount').css({display:"none"});
                }
                newgameUrl.find('.gamePrice').find('.discount').html(data[i].discount * 100 + '%');
                newgameUrl.find('.gamePrice').find('span').eq(1).html('￥'+data[i].originPrice);
                newgameUrl.find('.gamePrice').find('span').eq(2).html('￥'+data[i].price);

            }
            //兼容平台
            if(data[i].platform.indexOf("Windows") == 0){
                newgameUrl.find(".platform").find("img").eq(0).css('display', 'block');
            }
            if(data[i].platform.indexOf("Mac OS") == 1){
                newgameUrl.find(".platform").find("img").eq(1).css('display', 'block');
            }
            if(data[i].platform.indexOf("Steam") == 2){
                newgameUrl.find(".platform").find("img").eq(2).css('display', 'block');
            }//index返回字符串首次出现的位置
            // 游戏名
            newgameUrl.find('.name_game').html(data[i].name);
            // 发行日期
            newgameUrl.find('.date').find('span').html(data[i].date.replace('-','年').replace('-','月') + '日');
            // 口碑；1为“好评如潮”；2为"特别好评"；3为"多半好评"；4为"褒贬不一"；5为"多半差评"；6为"差评如潮"；7为"无评论
            if(data[i].evaluate == 1){
                newgameUrl.find('.evaluate').find('span').html("好评如潮").css({color:"#f99"});
            }
            if(data[i].evaluate == 2){
                newgameUrl.find('.evaluate').find('span').html("特别好评").css({color:"#66C0F4"});
            }
            if(data[i].evaluate == 3){
                newgameUrl.find('.evaluate').find('span').html("多半好评").css({color:"#123123"});
            }
            if(data[i].evaluate == 4){
                newgameUrl.find('.evaluate').find('span').html("褒贬不一").css({color:"#B9A074"});
            }
            if(data[i].evaluate == 5){
                newgameUrl.find('.evaluate').find('span').html("多半差评").css({color:"#B9A074"});
            }
            if(data[i].evaluate == 6){
                newgameUrl.find('.evaluate').find('span').html("差评如潮").css({color:"#B9A074"});
            }
            // 评价数量
            newgameUrl.find('.evaluatingCount').html(data[i].evaluatingCount.toLocaleString()).css({fontStyle:'normal'});
            // 用户标签
            for(var k = 0;k < data[i].label.length;k++){
                if(data[i].label[k]){
                    var newSpan = $(document.createElement('span'));//createElenment创建元素
                    newSpan.appendTo(newgameUrl.find('.box').find('.labelContent'));//appendto所选元素结尾插入元素
                }
                newgameUrl.find('.labelContent').find('span').eq(k).html(data[i].label[k]);
            }
            var newDot = $('<span></span>');
            newDot.attr('index',i);
            $('.dot').append(newDot);//添加小圆点
        }

        // 左右按钮切换图片
        var n = 0;
        //先展示首张
        $("#wrap").find('.gameUrl').eq(0).find(".box").fadeIn('fast');
        $('.dot').find('span').eq(0).css({background:'hsla(202,60%,100%,0.4)'});//色调、饱和度、亮色、Alpha透明度
        $('.dot').find('span').click(function(){
            var _index = $(this).attr('index');//保存点击的index
            $('.dot').find('span').css({backgroundColor:'hsla(202,60%,100%,0.2)'});//其余圆点变淡
            $("#wrap").find('.gameUrl').find(".box").hide();//其余box隐藏
            $(this).css({background:'hsla(202,60%,100%,0.4)'});//点击圆点变深
            $("#wrap").find('.gameUrl').eq(_index).find(".box").fadeIn('fast');//展示点击的
            n=_index;
        });

        $("#next").click(function(){
            $("#wrap").find('.gameUrl').find(".box").fadeOut(1500);
            if(n >= $("#wrap").find('.gameUrl').find('.box').length-1){
                n = 0;
                $("#wrap").find('.gameUrl').eq(n).find(".box").fadeIn(500);
            }else{
                $("#wrap").find('.gameUrl').eq(++n).find(".box").fadeIn(500);
            }
            $('.dot').find('span').eq(n).click();
        });
        $("#prev").click(function(){
            $("#wrap").find('.gameUrl').find(".box").fadeOut(1000);
            if(n <= 0){
                n = $("#wrap").find('.gameUrl').find('.box').length-1;
                $("#wrap").find('.gameUrl').eq(n).find(".box").fadeIn(500);
            }else{
                $("#wrap").find('.gameUrl').eq(--n).find(".box").fadeIn(500);
            }
            $('.dot').find('span').eq(n).click();
        });
        // 自动播放
        var t = setInterval(function(){
            $("#next").click();
        },3000);
        // 鼠标移入移出
        $("#wrap").find('.gameUrl').find(".box").mouseenter(function(){
            clearInterval(t);
            // 弹出层轮播图播放
            var m = 0;
            $(this).find('.aside_img').find('img').hide();
            $(this).find('.aside_img').find('img').eq(0).show();
            $(this).find('.aside').fadeIn("fast",function(){
                time = setInterval(()=>{
                    //(x)=>x+6相当于function(x){return x + 6;}
                            $(this).closest('.aside').find('.aside_img').find('img').hide();
                            //closest返回（）this的第一个aside的祖先
                if(m >= $(this).closest('.aside').find('.aside_img').find('img').length - 1){
                    m = 0;
                    $(this).closest('.aside').find('.aside_img').find('img').eq(0).fadeIn("fast");
                }else{
                    $(this).closest('.aside').find('.aside_img').find('img').eq(++m).fadeIn();
                }
            },1500);
            });
        });

        $("#wrap").find('.gameUrl').find(".box").mouseleave(function(){
            t = setInterval(function(){
                $("#next").click();
            },3000);
            $(this).find('.aside').fadeOut("fast",function(){
                clearInterval(time);
            });
        });
        //鼠标移入图片展示大图
        $("#wrap").find(".gameImg").find('img').mouseenter(function(){
            var aa = $(this).attr("src");
            $(this).closest(".box").find('.left').find("img").attr("src",aa);
        });
        $("#wrap").find(".gameImg").find('img').mouseleave(function(){
            var a2 = $(this).closest(".box").find(".gameImg").find('img').attr("src");
            $(this).closest(".box").find('.left').find("img").attr("src",a2);
        });

//            存储cookie
        $("#wrap").find(".gameUrl").click(function(){
            var game_name = $(this).find('.gameName').html();
            var game_url = $(this).attr('href');
            if(localStorage.getItem('historyName')){
                localStorage.setItem('historyName', `${localStorage.getItem('historyName')},${game_name}`);
                localStorage.setItem('historyUrl', `${localStorage.getItem('historyUrl')},${game_url}`);
            }else{
                localStorage.setItem('historyName',game_name);
                localStorage.setItem('historyUrl',game_url);
            };
        })
    };



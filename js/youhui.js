function fnSteam2(data){
        var cuxiao = $("#cuxiao");
        var da = data.length/3
        var max_imag_count=3;
        for(var i = 0;i < da;i++){
            var cbox = $("#cbox").clone(true);//.clone生成副本
            $("#cprev").before(cbox);//在被选元素前插入内容
            for(var k = 0;k < 3;k++)
            {
              var cmain_style=$("#cuxiao").find(".cb").eq(i).find(".cbox_main").eq(k);
              if(k==1)
                    cmain_style.attr("style","margin-left:14px;margin-right:14px;")
            }
            var newDot = $('<span></span>');
            newDot.attr('index',i);
            $('.cdot').append(newDot);//添加小圆点
        }

        for(k = 0;k < data.length;k++)
        {
            $("#cuxiao").find(".cah").eq(k).attr("href",data[k].url);
            var cmain_style=$("#cuxiao").find(".cb").find(".cbox_main").eq(k);
            cmain_style.find(".cbox_top").html('<img src='+data[k].main_imgUrl+'>');
            if(!data[k].isSale){
                cmain_style.find(".cbox_bottom").find('.cgamePrice').find('span').eq(2).html('￥'+data[i].price);
            }else{
                if(data[k].discount != 0){
                    cmain_style.find(".cbox_bottom").find('.cgamePrice').find('.discount').css({display:"inline-block"});
                }else{
                    cmain_style.find(".cbox_bottom").find('.cgamePrice').find('.discount').css({display:"none"});
                }
                cmain_style.find(".cbox_bottom").find('.cgamePrice').find('.discount').html(data[k].discount * 100 + '%');
                cmain_style.find(".cbox_bottom").find('.cgamePrice').find('span').eq(1).html('￥'+data[k].originPrice);
                cmain_style.find(".cbox_bottom").find('.cgamePrice').find('span').eq(2).html('￥'+data[k].price);

            }
            for(var j = 0;j < data[k].imgUrl.length;j++){
                cmain_style.find('.gameImg').find('li').eq(j).html('<img src='+data[k].imgUrl[j]+'>');//eq选择制定index的参数
                cmain_style.find('.aside_img').find('li').eq(j).html('<img src='+data[k].imgUrl[j]+'>');
            }

            // 游戏名
            cmain_style.find('.name_game').html(data[k].name);
            // 发行日期
            cmain_style.find('.date').find('span').html(data[k].date.replace('-','年').replace('-','月') + '日');
            // 口碑；1为“好评如潮”；2为"特别好评"；3为"多半好评"；4为"褒贬不一"；5为"多半差评"；6为"差评如潮"；7为"无评论
            if(data[k].evaluate == 1){
                cmain_style.find('.evaluate').find('span').html("好评如潮").css({color:"#f99"});
            }
            if(data[k].evaluate == 2){
                cmain_style.find('.evaluate').find('span').html("特别好评").css({color:"#66C0F4"});
            }
            if(data[k].evaluate == 3){
                cmain_style.find('.evaluate').find('span').html("多半好评").css({color:"#123123"});
            }
            if(data[k].evaluate == 4){
                cmain_style.find('.evaluate').find('span').html("褒贬不一").css({color:"#B9A074"});
            }
            if(data[k].evaluate == 5){
                cmain_style.find('.evaluate').find('span').html("多半差评").css({color:"#B9A074"});
            }
            if(data[k].evaluate == 6){
                cmain_style.find('.evaluate').find('span').html("差评如潮").css({color:"#B9A074"});
            }
            // 评价数量
            cmain_style.find('.evaluatingCount').html(data[k].evaluatingCount.toLocaleString()).css({fontStyle:'normal'});
            // 用户标签
            for(var x = 0;x < data[k].label.length;x++){
                if(data[k].label[x]){
                    var newSpan = $(document.createElement('span'));//createElenment创建元素
                    newSpan.appendTo(cmain_style.find('.labelContent'));//appendto所选元素结尾插入元素
                }
                cmain_style.find('.labelContent').find('span').eq(x).html(data[k].label[x]);
            }

        }
            cmain_style=$("#cuxiao").find(".cb").find(".cbox_main");
            cmain_style.mouseenter(function(){
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
                          $(this).closest('.aside').find('.aside_img').find('img').eq(0).fadeIn();
                      }else{
                          $(this).closest('.aside').find('.aside_img').find('img').eq(++m).fadeIn();
                      }
                  },1500);
                  });
              });

              cmain_style.mouseleave(function(){
                  clearInterval(time);
                  $(this).find('.aside').fadeOut("fast")
              });



        //先展示首张
        $("#cuxiao").find('.cb').eq(0).fadeIn(0);
        $('.cdot').find('span').eq(0).css({background:'hsla(202,60%,100%,0.4)'});//色调、饱和度、亮色、Alpha透明度
        $('.cdot').find('span').click(function(){
            var _index = $(this).attr('index');//保存点击的index
            $('.cdot').find('span').css({backgroundColor:'hsla(202,60%,100%,0.2)'});//其余圆点变淡
            $("#cuxiao").find(".cb").hide();//其余box隐藏
            $(this).css({background:'hsla(202,60%,100%,0.4)'});//点击圆点变深
            $("#cuxiao").find('.cb').eq(_index).fadeIn("fast");//展示点击的
        });


        // 左右按钮切换图片
        var n = 0;
        $("#cnext").click(function(){
            $("#cuxiao").find(".cb").fadeOut("fast");
            if(n >= $("#cuxiao").find('.cb').length-1){
                n = 0;
                $("#cuxiao").find('.cb').eq(n).fadeIn("fast");
            }else{
                $("#cuxiao").find('.cb').eq(++n).fadeIn("fast");
            }
            $('.cdot').find('span').eq(n).click();
        });
       $("#cprev").click(function(){
            $("#cuxiao").find(".cb").fadeOut("fast");
            if(n <= 0){
                n = $("#cuxiao").find(".cb").length-1;
                $("#cuxiao").find(".cb").eq(n).fadeIn("fast");
            }else{
                $("#cuxiao").find(".cb").eq(--n).fadeIn("fast");
            }
            $('.cdot').find('span').eq(n).click();
        });
        $("#cuxiao").find(".cah").click(function(){
            var game_name = $(this).find('.aside').find(".name_game").html();
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

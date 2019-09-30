<?php
  include "msql.php";
  $data=mysqli_query($mysqli,"SELECT * FROM liuyan,USER WHERE user.id = liuyan.id ORDER BY DATE");

    $rows=mysqli_num_rows($data);
    echo "
    <script>
      $(function(){
        var row = $rows;
        for(var i=0;i<7;i++){
            var newlm = $('#lm').clone(true);//.clone生成副本

            $('#p').append(newlm);//在被选元素前插入内容
        }
        for(var j=0;j<row/8;j++){
          var newDot = $('<span></span>');
          newDot.attr('index',j);
          newDot.html(j+1);
          $('.pdot').append(newDot);

          var page = $('#p').clone(true);//.clone生成副本
          $('.pdot').before(page);//在被选元素前插入内容
        }

        $('.main').find('.page').eq(0).fadeIn('fast');
        $('.pdot').find('span').eq(0).css({background:'hsla(202,60%,100%,0.4)'});//色调、饱和度、亮色、Alpha透明度
        $('.pdot').find('span').click(function(){
            var _index = $(this).attr('index');//保存点击的index
            $('.pdot').find('span').css({backgroundColor:'hsla(202,60%,100%,0.2)'});//其余圆点变淡
            $('.main').find('.page').hide();//其余box隐藏
            $(this).css({background:'hsla(202,60%,100%,0.4)'});//点击圆点变深
            $('.main').find('.page').eq(_index).fadeIn('fast');//展示点击的
        });
      });
    </script>
    ";
    $i=$rows-1;
    while($row = $data->fetch_array()) {
        //echo "id: " . $row["id"]. " - txt: " . $row["txt"]. "<br>";
            $id=$row["id"];
            $nicheng=$row["nicheng"];
            $txt=$row["txt"];
            $date=$row["date"];
            $imgurl=$row['imgurl'];
            $backurl=$row['backurl'];

            echo "
            <script>
              $(function(){

                $('.main').find('.id').eq($i).html('$nicheng uid:$id');
                $('.main').find('.id').eq($i).closest('.liuyan_main').css('background','url($backurl)');
                $('.main').find('.id').eq($i).closest('.liuyan_main').css('background-size','100%');

                $('.main').find('.txt').eq($i).html('$txt');
                $('.main').find('.pt').eq($i).css('display','block');
                $('.main').find('.pt').eq($i).attr('src','$imgurl');
                $('.main').find('.date_div').eq($i).prepend('<span>发布于:</span>');
                $('.main').find('.date').eq($i).html('$date');
              });
            </script>
            ";
            $i--;
    }

    $mysqli->close();//关闭数据库

?>
<!--                 $imgurl=$d->fetch_array()["imgurl"];
                $('.main').find('.pt').eq($i).attr('src','$imgurl'); -->

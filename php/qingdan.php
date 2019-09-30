<?php
    include "msql.php";
    date_default_timezone_set('prc');
    session_start();
    if(isset($_SESSION['name'])){
        $id = $_SESSION['id'];
        $proid=$_SESSION['proid'];
        $date = date('y-m-d h:i:s',time());
        $url = $_SESSION['url'];
        $sql="insert into qingdan(id,product_id,add_date,p_url) values('$id','$proid','$date','$url')";

        if ($mysqli->query($sql) === TRUE) {
            echo"<script>alert('添加成功');setTimeout(function(){window.location.href='http://localhost/steam-master/qingdan.html';},0);</script>";
        } else {
            echo"<script>alert('错误');setTimeout(function(){window.location.href='http://localhost/steam-master/qingdan.html';},0);</script>";
        }


    }
?>

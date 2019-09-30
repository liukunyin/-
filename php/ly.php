<?php
date_default_timezone_set('prc');
    header("Content-Type: text/html; charset=utf8");
    session_start();
    if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作
    if(!isset($_SESSION['nicheng'])){
        exit("错行");
    }

    $liuyan=$_POST['liuyan'];//post获取表单里的name
    $nicheng =$_SESSION['nicheng'];
    $id = $_SESSION['id'];
    $date = date('y-m-d h:i:s',time());

    include "msql.php";


    $sql = "insert into liuyan(id,nicheng,txt,date) values ('$id','$nicheng','$liuyan','$date')";

        if ($mysqli->query($sql) === TRUE) {
            echo"<script>alert('留言成功');setTimeout(function(){window.location.href='http://localhost/steam-master/shequ.html';},0);</script>";
        } else {
            echo"<script>alert('错误执行');setTimeout(function(){window.location.href='http://localhost/steam-master/shequ.html';},0);</script>";
        }



        $mysqli->close();//关闭数据库

?>

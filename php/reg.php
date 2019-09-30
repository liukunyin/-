<?php
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作

    $name=$_POST['name'];//post获取表单里的name
    $password=$_POST['password'];//post获取表单里的password
    $nicheng = $_POST['nicheng'];
    include "msql.php";

    if ($nicheng==null) {
        $nicheng = $name;
    }
    $sql = "insert into user(name,password,nicheng) values ('$name','$password','$nicheng')";

        if ($mysqli->query($sql) === TRUE) {
            echo"<script>alert('创建成功');setTimeout(function(){window.location.href='http://localhost/steam-master/login.html';},0);</script>";
        } else {
            echo"<script>alert('用户名已存在');setTimeout(function(){window.location.href='http://localhost/steam-master/reg.html';},0);</script>";
        }



        $mysqli->close();//关闭数据库

?>


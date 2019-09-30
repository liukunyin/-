<?php
session_start();
    if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作
    if(!isset($_SESSION['name']))
    {
       echo "<script>alert('请登录');setTimeout(function(){window.location.href='http://localhost/steam-master/userhome.html';},0);</script>";
    }

    $imgurl = $_POST['0'];//头像
    $nicheng = $_POST['1'];//昵称
    $backurl = $_POST['2'];//背景
    $password=$_POST['3'];//post获取表单里的password
    $checkpassword=$_POST['4'];//post获取表单里的password
    $name = $_SESSION['name'];
    include "msql.php";

    if ($imgurl!=null) {
        $sql = " update user SET imgurl = '$imgurl' WHERE name = '$name' ";

        if ($mysqli->query($sql) === false) {
            echo"<script>alert('error');setTimeout(function(){window.location.href='http://localhost/steam-master/userhome.html';},0);</script>";
        }
    }

    if ($nicheng!=null) {
        $sql = " update user SET nicheng = '$nicheng' WHERE name = '$name' ";
        if ($mysqli->query($sql) === false) {
            echo"<script>alert('error');setTimeout(function(){window.location.href='http://localhost/steam-master/userhome.html';},0);</script>";
        }
    }
    if ($backurl!=null) {
        $sql = " update user SET backurl = '$backurl' WHERE name = '$name' ";
        if ($mysqli->query($sql) === false) {
            echo"<script>alert('error');setTimeout(function(){window.location.href='http://localhost/steam-master/userhome.html';},0);</script>";
        }
    }

    if ($password!=null) {
        $sql = " update user SET password = '$password' WHERE name = '$name' ";
        if ($mysqli->query($sql) === false) {
            echo"<script>alert('error');setTimeout(function(){window.location.href='http://localhost/steam-master/userhome.html';},0);</script>";
        }
    }

     $data=mysqli_query($mysqli,"select * from user where name = '$name'");
     if(mysqli_num_rows($data)==1){
        $rows=mysqli_fetch_array($data);
        $_SESSION['id']=$rows['id'];
        $_SESSION['name']=$rows['name'];
        $_SESSION['nicheng']=$rows['nicheng'];
        $_SESSION['imgurl']=$rows['imgurl'];
        $_SESSION['backurl']=$rows['backurl'];
        $home_url = 'http://localhost/steam-master/userhome.html';

        echo "<script>alert('修改成功!');location='$home_url'</script>";
        $mysqli->close();//关闭数据库
     }else{
        echo "<script>alert('error');setTimeout(function(){window.location.href='http://localhost/steam-master/userhome.html';},0);</script>";
     }

?>

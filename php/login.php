<?php
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作


    //开启一个会话
    session_start();
    if(!isset($_SESSION['name'])){
        if(isset($_POST['submit'])){
            $error_msg = "";
            $name=$_POST['name'];//post获取表单里的name
            $password=$_POST['password'];//post获取表单里的password
            include "msql.php";
            if ($name && $password){//如果用户名和密码都不为空
                 $data=mysqli_query($mysqli,"select * from user where name = '$name' and password='$password'");

                 if(mysqli_num_rows($data)==1){
                    $rows=mysqli_fetch_array($data);
                    $_SESSION['id']=$rows['id'];
                    $_SESSION['name']=$rows['name'];
                    $_SESSION['nicheng']=$rows['nicheng'];
                    $_SESSION['imgurl']=$rows['imgurl'];
                    $_SESSION['backurl']=$rows['backurl'];
                    $home_url = 'http://localhost/steam-master/index.html';

                    echo "<script>alert('登录成功!');location='$home_url'</script>";
                    $mysqli->close();//关闭数据库
                 }else{
                    echo "<script>alert('用户名或密码错误');location='http://localhost/steam-master/login.html'</script>";
                 }
            }
        }
}
else
{
    echo "<script>alert('请先注销该账号');location='http://localhost/steam-master/index.html'</script>";
}
?>


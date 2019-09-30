<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
    if(isset($_SESSION['name'])){
            session_unset();//free all session variable
            session_destroy();//销毁一个会话中的全部数据
            setcookie(session_name(),'',time()-3600);//销毁与客户端的卡号
            echo "<script>alert('已退出登录');location='http://localhost/steam-master/index.html'</script>";
        }else{
            echo "<script>alert('错误');location='http://localhost/steam-master/index.html'</script>";
        }
?>

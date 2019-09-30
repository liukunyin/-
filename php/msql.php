<?php
try{
    $mysqli = new mysqli("localhost", "root", "000323624", "steam");
    if(mysqli_connect_errno()){    //判断是否成功连接上MySQL数据库
        throw new Exception('数据库连接错误！');  //如果连接错误，则抛出异常
    }
}catch (Exception $e){        //捕获异常
    echo $e->getMessage();    //打印异常信息
}

?>

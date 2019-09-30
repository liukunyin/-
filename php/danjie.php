<?php
    include "msql.php";
    session_start();
    if(isset($_SESSION['name'])){
        $pid = $_POST['pi'];
        $sql="SELECT product_price FROM product WHERE product_id = $pid";
     $data=mysqli_query($mysqli,$sql);
     if(mysqli_num_rows($data)==1){
        $rows=mysqli_fetch_array($data);
        $money=$rows['product_price'];
            echo"<script>alert('$money');setTimeout(function(){window.location.href='http://localhost/steam-master/qingdan.html';},0);</script>";
    }
}
?>

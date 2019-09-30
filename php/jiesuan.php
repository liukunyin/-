<?php
    include "msql.php";
    session_start();
    if(isset($_SESSION['name'])){
        $id = $_SESSION['id'];
        $sql="SELECT SUM(product_price)FROM qingdan,product WHERE qingdan.product_id = product.product_id AND id = $id";
     $data=mysqli_query($mysqli,$sql);
     if(mysqli_num_rows($data)==1){
        $rows=mysqli_fetch_array($data);
        $money=$rows['SUM(product_price)'];
            echo"<script>alert('$money');setTimeout(function(){window.location.href='http://localhost/steam-master/qingdan.html';},0);</script>";
    }
}
?>

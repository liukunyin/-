<?php
    include "msql.php";
    session_start();
    if(isset($_SESSION['name'])){
        $id = $_SESSION['id'];
        $proid=$_POST['pid'];
        $sql="DELETE FROM qingdan WHERE id = $id and product_id = $proid";

        if ($mysqli->query($sql) === TRUE) {
            echo"<script>setTimeout(function(){window.location.href='http://localhost/steam-master/qingdan.html';},0);</script>";
        } else {
            echo"<script>alert('$proid');</script>";
        }


    }
?>

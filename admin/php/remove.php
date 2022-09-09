<?php 
    include('../../php/config.php');
    $id = $_GET['id'];
    $sql = mysqli_query($db,"DELETE from blog WHERE id='$id'");
    if($sql){
        header("Location: ../index.php");
    }
    else{
        echo "<script> alert('Problem')</script>";
    }
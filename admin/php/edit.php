<?php
    include('../../php/config.php');
    $name = $_POST['title'];
    if(empty($name)){
        echo "Name is Required";
    }
    else{
        $content = $_POST['content'];
        $id=$_POST['id'];
        $step = $_POST['step'];
            $sql = mysqli_query($db,"UPDATE blog  SET title = '$name',content ='$content',steps='$step' WHERE id='$id'");
        if($sql){
            echo 'S';
        }
        else{
            echo "Error: ";
        }
    }
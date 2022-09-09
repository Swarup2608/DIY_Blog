<?php
    include('../../php/config.php');
    $name = $_POST['title'];
    if(empty($name)){
        echo "Name is Required";
    }
    else{
        $tags = explode(",", $_POST['tags']);
        $type = $_POST['type'];
        $content = $_POST['content'];
        
        if(isset($_FILES['image'])){
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"../../images/".$new_img_name)){
                    }
                }
            }
        }
        $sql = mysqli_query($db,"INSERT INTO blog(title, type, content,image) VALUES ('$name','$type','$content','$new_img_name')");
        
        if($sql){
            echo 'S';
        }
        else{
            echo "Error: ";
        }
        $id = mysqli_fetch_assoc(mysqli_query($db,"SELECT id FROM blog WHERE title='$name'"));
        $id = $id['id'];
        foreach ($tags as $value) {
            $num = $value;
            $sql1 = mysqli_query($db,"INSERT INTO tags(tag,blog_id) VALUES('$num','$id')");
            // echo $value;
        }
    }
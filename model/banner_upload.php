<?php

include_once "../db/config.php";
if(count($_FILES) > 0) {
    if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {

        
        $img = mysqli_real_escape_string($conn, $_FILES['userImage']["name"]);
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);      

        $temp_name = $_FILES["userImage"]["tmp_name"];
    
        $getFormat = explode(".",  $img);
        $fileFormat = end($getFormat);
    
        $imgFile = file_get_contents($temp_name);
        $image = base64_encode($imgFile);
        $path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        $path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);  

        $newfilename = round(microtime(true)) ;

        $image_path = "assets/new_upload/" .  $newfilename. '.'.$fileFormat ;
        $folder = "$path/".$image_path;
        move_uploaded_file($temp_name, $image_path);

        
        $sql = "INSERT INTO banner(imageType ,imageData, filepath, banner_url )
        VALUES('{$imageProperties['mime']}', '{$imgData}','{$image_path}','{$folder}')";

        $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
        
        if(isset($current_id)) {
            header("Location:../admin/banner.php");
        }
            }
    }
   
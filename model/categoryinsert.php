<?php

require_once('../db/base_url.php');
include "../db/config.php";

if(isset($_POST['submit'])) {
    
        $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);              
        $img = mysqli_real_escape_string($conn, $_FILES['category_image']["name"]);
        $imgData = addslashes(file_get_contents($_FILES['category_image']['tmp_name']));
        
        $imageProperties = getimageSize($_FILES['category_image']['tmp_name']);

        $temp_name = $_FILES["category_image"]["tmp_name"];
    
        $getFormat = explode(".",  $img);
        $fileFormat = end($getFormat);
    
        $imgFile = file_get_contents($temp_name);
        $image = base64_encode($imgFile);

        $newfilename = round(microtime(true)) ;
        $category_id = rand();

        $image_path = "../" . $category_base .  $newfilename . '.' . $fileFormat;
        $category_image_name = $newfilename . '.' . $fileFormat;

        move_uploaded_file($temp_name, $image_path);

        $image_path = $server_url . $category_base .  $newfilename . '.' . $fileFormat;
        
        $sql = "INSERT INTO category (no_of_data, category_id, category_name, category_image, category_image_name, image_url)
        VALUES('','{$category_id}','{$category_name}', '{$imgData}','{$category_image_name}','{$image_path}')";

        if(mysqli_query($conn, $sql)){

                   
         echo '<script type ="text/javascript"> alert ("Category Details entered Succesfully.")</script>';
         header("Location: ../admin/category.php");
    
            
        }else{
           echo '<script type ="text/javascript"> alert ("Category Details are not entered please Try again.")</script>';
                
    }        
    }
   
?>
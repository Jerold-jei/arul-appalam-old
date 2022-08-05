<?php

include "../db/config.php";

if(isset($_POST['submit'])) {
    
        $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);              
        $img = mysqli_real_escape_string($conn, $_FILES['category_image']["name"]);
        $imgData = addslashes(file_get_contents($_FILES['category_image']['tmp_name']));
        
        $imageProperties = getimageSize($_FILES['category_image']['tmp_name']);

        $path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        $path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);        
       
        $temp_name = $_FILES["category_image"]["tmp_name"];
    
        $getFormat = explode(".",  $img);
        $fileFormat = end($getFormat);
    
        $imgFile = file_get_contents($temp_name);
        $image = base64_encode($imgFile);

        $newfilename = round(microtime(true)) ;
        $category_id = rand();

        $image_path = "assets/category/" .  $newfilename. '.'.$fileFormat;
        $folder = "$path/".$image_path;

        move_uploaded_file($temp_name, $image_path);

        
        $sql = "INSERT INTO category (no_of_data, category_id, category_name, category_image, image_path, image_url)
        VALUES('','{$category_id}','{$category_name}', '{$imgData}','{$image_path}','{$folder}')";

        if(mysqli_query($conn, $sql)){

                   
         echo '<script type ="text/javascript"> alert ("Category Details entered Succesfully.")</script>';
         header("Location: ../admin/category.php");
    
            
        }else{
           echo '<script type ="text/javascript"> alert ("Category Details are not entered please Try again.")</script>';
                
    }        
    }
   
?>
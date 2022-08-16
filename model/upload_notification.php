<?php

require_once('../db/base_url.php');
include "../db/config.php";
  
        $notification_title = mysqli_real_escape_string($conn, $_POST['notification_title']);     
        $notification = mysqli_real_escape_string($conn, $_POST['notification']);      
        $valid_date = mysqli_real_escape_string($conn, $_POST['valid_date']);   
        $img = mysqli_real_escape_string($conn, $_FILES['image']["name"]);
        $imag = addslashes(file_get_contents($_FILES['image']['tmp_name']));  
        
        
        $newfilename = round(microtime(true)) ;
               
        $temp_name = $_FILES["image"]["tmp_name"];
    
        $getFormat = explode(".", $img);
        $fileFormat = end($getFormat);
    
        $imgFile = file_get_contents($temp_name);
        $image = base64_encode($imgFile);

        $image_path = "../" . $notification_base .  $newfilename . '.' . $fileFormat;
        //$notification_image_name = $newfilename . '.' . $fileFormat;

        
        $notification_id = rand();   

        move_uploaded_file($temp_name, $image_path);

        $image_path = $server_url . $notification_base .  $newfilename . '.' . $fileFormat;
         
        $sql = "INSERT INTO notifications (no_of_data, notification_id, notification_title, notification, valid_date, notification_image, image_path)
        VALUES('','{$notification_id}','{$notification_title}','{$notification}','{$valid_date}','{$imag}','{$image_path}')";

        if(mysqli_query($conn, $sql)){

                   
         echo '<script type ="text/javascript"> alert ("Notification Details entered Succesfully.")</script>';
         header("Location: ../admin/notification.php");
    
            
        }else{
           echo '<script type ="text/javascript"> alert ("Notification Details are not entered please Try again.")</script>';
                
    }

   // }
   
?>
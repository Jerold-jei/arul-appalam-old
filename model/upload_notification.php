<?php

include "../db/config.php";
  
        $notification_title = mysqli_real_escape_string($conn, $_POST['notification_title']);     
        $notification = mysqli_real_escape_string($conn, $_POST['notification']);      
        $valid_date = mysqli_real_escape_string($conn, $_POST['valid_date']);   
        $img = mysqli_real_escape_string($conn, $_FILES['image']["name"]);
        $imag = addslashes(file_get_contents($_FILES['image']['tmp_name']));  
        
        $path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        $path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);  

        $newfilename = round(microtime(true)) ;
        //$product_id = rand();
        
        $temp_name = $_FILES["image"]["tmp_name"];
    
        $getFormat = explode(".", $img);
        $fileFormat = end($getFormat);
    
        $imgFile = file_get_contents($temp_name);
        $image = base64_encode($imgFile);

        $image_path = "assets/notification/" .  $newfilename. '.'.$fileFormat;   
        $folder = "$path/".$image_path; 
        $notification_id = rand();        
        move_uploaded_file($temp_name, $image_path);
         
        $sql = "INSERT INTO notifications (no_of_data, notification_id, notification_title, notification, valid_date, notification_image, image_path)
        VALUES('','{$notification_id}','{$notification_title}','{$notification}','{$valid_date}','{$imag}','{$folder}')";

        if(mysqli_query($conn, $sql)){

                   
         echo '<script type ="text/javascript"> alert ("Notification Details entered Succesfully.")</script>';
         header("Location: ../admin/notification.php");
    
            
        }else{
           echo '<script type ="text/javascript"> alert ("Notification Details are not entered please Try again.")</script>';
                
    }

   // }
   
?>
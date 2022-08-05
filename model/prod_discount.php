<?php

include "../db/config.php";

    $coupon_title = mysqli_real_escape_string($conn, $_POST['coupon_title']);
    $discount = mysqli_real_escape_string($conn, $_POST['discount']);
    $exp_date = mysqli_real_escape_string($conn, $_POST['exp_date']);
    $coup_details = mysqli_real_escape_string($conn, $_POST['coup_details']);
   
    $sql = "INSERT IGNORE INTO coupons (coupon_id, coupon_title, discount, exp_date, coup_details, coup_activate) VALUES ('{}','{$coupon_title}','{$discount}','{$exp_date}','{$coup_details}', '')";
                    if(mysqli_query($conn, $sql)){

        echo '<script type ="text/javascript"> alert ("Coupon Details entered Succesfully.")</script>';
        header("Location: ../admin/discount.php");
      
        }else{
            echo '<script type ="text/javascript"> alert ("Coupon Details are not entered please Try again.")</script>';
            
        }
   
?>
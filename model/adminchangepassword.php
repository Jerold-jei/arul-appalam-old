<?php

include "../db/Db connection.php"; 

session_start();
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $o_password = mysqli_real_escape_string($conn, $_POST['o_password']);
    $n_password = mysqli_real_escape_string($conn, $_POST['n_password']);
    $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);
    
   
	$password_query = mysqli_query($conn, "SELECT * from admin where username = '".$username."'");
	$password_row = mysqli_fetch_array($password_query);
	$database_password = $password_row['password'];

	if ($n_password == $c_password)
		{
		if ($database_password == $o_password)
			{
			$update_pwd = mysqli_query($conn, "UPDATE admin set password='".$n_password."' where Username = '".$username."'");
            echo '<script type ="text/javascript"> alert ("Your Password Updated Sucessfully")</script>';
            }
		  else
			{
                echo '<script type ="text/javascript"> alert ("Your Current password is wrong")</script>';
               
			}
		}
	  else
		{
		    echo '<script type ="text/javascript"> alert ("Your New and Confirm Password is not match")</script>';
            
		}
    
 ?>


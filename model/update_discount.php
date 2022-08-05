<?php

include "../db/config.php";



if (isset($_POST["update"])) {

	
    $id = mysqli_real_escape_string($conn,$_POST["coupon_id"]);	  
	$n_category = mysqli_real_escape_string($conn, $_POST['n_category']);

    $querySelect = "SELECT * FROM coupons where coupon_id =  $id";
       
		$ResultSelectStmt = mysqli_query($conn, $querySelect);
		$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

              	
		if($fetchRecords > 0){

			$liveSqlQQ = "UPDATE coupons SET coup_activate = 'Enabled' where coupon_id = $id";
			$update = mysqli_query($conn, $liveSqlQQ);	
			
			if($update)
			{
			    echo "Coupon activated successfully";
                header("Location: ../admin/discount.php");
				//exit();
			}else
		    {
			$displayErrMessage = "Sorry, Unable to update";
		    }
   
        }else{
            echo "Error!!!";
    }
   
    
}

if (isset($_POST["updateoff"])) {

	
    $id = mysqli_real_escape_string($conn,$_POST["coupon_id"]);	
	$n_category = mysqli_real_escape_string($conn, $_POST['n_category']);

       
    $querySelect = "SELECT * FROM coupons where coupon_id =  $id";
       
		$ResultSelectStmt = mysqli_query($conn, $querySelect);
		$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

              	
		if($fetchRecords > 0){

			$liveSqlQQ = "UPDATE coupons SET coup_activate = 'Disabled' where coupon_id = $id";
			$update = mysqli_query($conn, $liveSqlQQ);	
			
			if($update)
			{
			    echo "Coupon activated successfully";
                header("Location: ../admin/discount.php");
				//exit();
			}else
		    {
			$displayErrMessage = "Sorry, Unable to update";
		    }
   
        }else{
            echo "Error!!!";
    }
   
    
}
?>
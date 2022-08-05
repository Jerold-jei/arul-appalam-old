<?php

include "../db/config.php";
if (isset($_POST["update"])) {

	
    $id = mysqli_real_escape_string($conn,$_POST["category_id"]);	           
	$n_category = mysqli_real_escape_string($conn, $_POST['n_category']);

    $querySelect = "SELECT * FROM category where category_id =  $id";
       
		$ResultSelectStmt = mysqli_query($conn, $querySelect);
		$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

              	
		if($fetchRecords > 0){

			$liveSqlQQ = "UPDATE category SET category_name = '".$n_category."' where category_id = $id";
			$update = mysqli_query($conn, $liveSqlQQ);	
			
			if($update)
			{
			    echo "Category updated successfully";
                header("Location: ../admin/category.php");
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
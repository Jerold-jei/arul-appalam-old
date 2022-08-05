<?php

include "../db/config.php";

if (isset($_GET["delete_id"])) {

    $id = $_GET["delete_id"];
   
   
    $querySelect = "SELECT * FROM category where category_id =  $id";
       
		$ResultSelectStmt = mysqli_query($conn, $querySelect);
		$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

              	
		if(unlink($fetchRecords['image_path']))
		{
			$liveSqlQQ = "DELETE from category where category_id = $id";
			$rsDelete = mysqli_query($conn, $liveSqlQQ);	
			
			if($rsDelete)
			{
			    echo "Record deleted successfully";
                header("Location: ../admin/category.php");
				//exit();
			}else
		    {
			$displayErrMessage = "Sorry, Unable to delete Image";
		    }
   
        }else{
            echo "No Image";
    }
   
    
}

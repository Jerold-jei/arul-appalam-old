<?php

include_once "../db/config.php";


if (isset($_GET["delete_id"])) {

    $id = $_GET["delete_id"];
   
   
    $querySelect = "SELECT * FROM banner where image_id =  $id";
       
		$ResultSelectStmt = mysqli_query($conn, $querySelect);
		$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

              	
		if(unlink($fetchRecords['filepath']))
		{
			$liveSqlQQ = "DELETE from banner where image_id = $id";
			$rsDelete = mysqli_query($conn, $liveSqlQQ);	
			
			if($rsDelete)
			{
				header("Location:../admin/banner.php");
				exit();
			}else
		    {
			$displayErrMessage = "Sorry, Unable to delete Banner";
		    }
   
        }else{
            echo "No Image";
    }
   
    
}

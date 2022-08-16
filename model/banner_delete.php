<?php
require_once('../db/base_url.php');
include_once "../db/config.php";


if (isset($_GET["delete_id"])) {

    $id = $_GET["delete_id"];
   
   
    $querySelect = "SELECT image_name FROM banner where image_id =  $id";
       
		$ResultSelectStmt = mysqli_query($conn, $querySelect);
		$banner = mysqli_fetch_assoc($ResultSelectStmt);

              	
		if (unlink("../" . $banner_base . $banner['image_name'])) {
			$liveSqlQQ = "DELETE from banner where image_id = $id";
			$rsDelete = mysqli_query($conn, $liveSqlQQ);
			if ($rsDelete) {
				header("Location: ../admin/banner.php");
			} else {
				echo "Banner is not deleted from database";
			}
		} else {
			echo "Banner is not deleted from folder";
		}
   
    
}

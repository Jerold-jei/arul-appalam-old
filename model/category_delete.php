<?php

require_once('../db/base_url.php');
include "../db/config.php";

if (isset($_GET["delete_id"])) {

    $id = $_GET["delete_id"];
   
   
    $querySelect = "SELECT category_image_name FROM category where category_id =  $id";
       
		$ResultSelectStmt = mysqli_query($conn, $querySelect);
		$category = mysqli_fetch_assoc($ResultSelectStmt);

              	
		if (unlink("../" . $category_base . $category['category_image_name'])) {
			$liveSqlQQ = "DELETE from category where category_id = $id";
			$rsDelete = mysqli_query($conn, $liveSqlQQ);
			if ($rsDelete) {
				header("Location: ../admin/category.php");
			} else {
				echo "Category image is not deleted from database";
			}
		} else {
			echo "Category image is not deleted from folder";
		}
   
   
    
}

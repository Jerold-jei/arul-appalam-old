<?php
require_once('../db/base_url.php');
include "../db/config.php";

if (isset($_GET["delete_id"])) {

	$id = $_GET["delete_id"];

	$querySelect = "SELECT image_name FROM products where product_id =  $id";
	$ResultSelectStmt = mysqli_query($conn, $querySelect);
	$image = mysqli_fetch_assoc($ResultSelectStmt);


	if (unlink("../" . $product_base . $image['image_name'])) {
		$liveSqlQQ = "DELETE from products where product_id = $id";
		$rsDelete = mysqli_query($conn, $liveSqlQQ);
		if ($rsDelete) {
			header("Location: ../admin/product_details.php");
		} else {
			echo "Image not delete from database";
		}
	} else {
		echo "Image not delete from folder";
	}
}

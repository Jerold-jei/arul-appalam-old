<?php
require_once('../db/base_url.php');
include "../db/config.php";
if (isset($_POST["update"])) {

	$id = $_POST["product_id"];
	$product = $_POST['product'];
	$description = $_POST["description"];
	$u_prodtype = $_POST['u_prodtype'];

	$new_image = $_FILES['p_image']["name"];
	//$imag = addslashes(file_get_contents($_FILES['p_image']['tmp_name']));

	$old_image =  $_POST['old_image_name'];
	$price = $_POST['price'];
	$stock = $_POST["stock"];

	if($new_image != ''){
		$update_image = $_FILES['p_image']["name"];
	}else{
		$update_image = $old_image;
	}

	$newfilename = round(microtime(true));

	$temp_name = $_FILES["p_image"]["tmp_name"];

	$getFormat = explode(".", $new_image);
	$fileFormat = end($getFormat);

	$imgFile = file_get_contents($temp_name);
	$new_image = base64_encode($imgFile);

	$image_path = "../" . $product_base .  $newfilename . '.' . $fileFormat;
	$image_name = $newfilename . '.' . $fileFormat;

	move_uploaded_file($temp_name, $image_path);

	$image_path = $server_url . $product_base .  $newfilename . '.' . $fileFormat;

	$querySelect = "SELECT product_name, description, prod_type, image, image_name, image_url, price, count_in_stock FROM products where product_id =  $id";
	$ResultSelectStmt = mysqli_query($conn, $querySelect);
	$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);


	if ($fetchRecords > 0) {

		$liveSqlQQ = "UPDATE products SET product_name = '" . $n_product . "',
			description = '" . $n_description . "', prod_type = '" . $u_prodtype . "',
			image = '" . $imag . "', image_name = '" . $image_name . "', image_url = '" . $image_path . "' price = '" . $n_price . "', count_in_stock = '" . $n_stock . "'
			where product_id = $id";
		$update = mysqli_query($conn, $liveSqlQQ);

		if ($update) {
			echo "Product updated successfully";
			header("Location: ../admin/product_details.php");
		} else {
			$displayErrMessage = "Sorry, Unable to update";
		}
	} else {
		echo "Error!!!";
	}
}

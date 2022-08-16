<?php
require_once('../db/base_url.php');
include "../db/config.php";

$category_name = mysqli_real_escape_string($conn, $_POST['Category']);
$cate = "SELECT category_id FROM category where category_name = '$category_name'";
$result = $conn->query($cate);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $category_id  = $row['category_id'];
}
$pname = mysqli_real_escape_string($conn, $_POST['Pname']);
$description = mysqli_real_escape_string($conn, $_POST['Description']);
$prod_type = mysqli_real_escape_string($conn, $_POST['prod_type']);
$img = mysqli_real_escape_string($conn, $_FILES['image']["name"]);
$imag = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$price = mysqli_real_escape_string($conn, $_POST['Price']);
$stock = mysqli_real_escape_string($conn, $_POST['Stock']);
$date = mysqli_real_escape_string($conn, $_POST['Date']);
$quantity = mysqli_real_escape_string($conn, $_POST['Quantity']);
$minquantity = mysqli_real_escape_string($conn, $_POST['minQuantity']);


$newfilename = round(microtime(true));
$product_id = rand();

$temp_name = $_FILES["image"]["tmp_name"];

$getFormat = explode(".", $img);
$fileFormat = end($getFormat);

$imgFile = file_get_contents($temp_name);
$image = base64_encode($imgFile);

$image_path = "../" . $product_base .  $newfilename . '.' . $fileFormat;
$image_name = $newfilename . '.' . $fileFormat;

move_uploaded_file($temp_name, $image_path);

$image_path = $server_url . $product_base .  $newfilename . '.' . $fileFormat;

$sql = "INSERT INTO products (product_id, category_id, category_name, product_name, description, prod_type, image, image_name, image_url, price, count_in_stock, created_date, quantity, minquantity) VALUES ('$product_id','$category_id','$category_name','$pname','$description', '$prod_type', '$imag','$image_name','$image_path','$price',' $stock',' $date','$quantity','$minquantity')";
if (mysqli_query($conn, $sql)) {


    echo '<script type ="text/javascript"> alert ("Product Details entered Succesfully.")</script>';
    header("Location: ../admin/product_details.php");
} else {
    echo '<script type ="text/javascript"> alert ("Product Details are not entered please Try again.")</script>';
}

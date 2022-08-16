<?php
require_once('../db/base_url.php');
include_once "../db/config.php";
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {


        $img = mysqli_real_escape_string($conn, $_FILES['userImage']["name"]);
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

        $temp_name = $_FILES["userImage"]["tmp_name"];

        $getFormat = explode(".",  $img);
        $fileFormat = end($getFormat);

        $imgFile = file_get_contents($temp_name);
        $image = base64_encode($imgFile);
        
        $newfilename = round(microtime(true));
        
        $image_path = "../" . $banner_base .  $newfilename . '.' . $fileFormat;
        $image_name = $newfilename . '.' . $fileFormat;

        move_uploaded_file($temp_name, $image_path);

        $image_path = $server_url . $banner_base .  $newfilename . '.' . $fileFormat;

        $sql = "INSERT INTO banner(imageType ,imageData, image_name, banner_url )
        VALUES('{$imageProperties['mime']}', '{$imgData}','{$image_name}','{$image_path}')";

        $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));

        if (isset($current_id)) {
            header("Location:../admin/banner.php");
        }
    }
}

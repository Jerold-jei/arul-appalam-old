<?php

include "../db/config.php";
if (isset($_POST["update"])) {

	$id = mysqli_real_escape_string($conn,$_POST["product_id"]);	           
	$n_product = mysqli_real_escape_string($conn, $_POST['n_product']);
    $n_description = mysqli_real_escape_string($conn,$_POST["n_description"]);	           
	$u_prodtype = mysqli_real_escape_string($conn, $_POST['u_prodtype']);  

	$n_image = mysqli_real_escape_string($conn, $_FILES['n_image']["name"]);
    $imag = addslashes(file_get_contents($_FILES['n_image']['tmp_name']));

    $path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    $path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]); 

	$n_price = mysqli_real_escape_string($conn, $_POST['n_price']);
    $n_stock = mysqli_real_escape_string($conn,$_POST["n_stock"]);	           

		$newfilename = round(microtime(true)) ;
              
        $temp_name = $_FILES["n_image"]["tmp_name"];
    
        $getFormat = explode(".", $n_image);
        $fileFormat = end($getFormat);
    
        $imgFile = file_get_contents($temp_name);
		$n_image = base64_encode($imgFile);

        $image_path = "assets/upload/" .  $newfilename. '.'.$fileFormat;   
        $folder = "$path/".$image_path; 

        move_uploaded_file($temp_name, $image_path);    


    $querySelect = "SELECT * FROM products where product_id =  $id";       
		$ResultSelectStmt = mysqli_query($conn, $querySelect);
		$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

              	
		if($fetchRecords > 0){

			$liveSqlQQ = "UPDATE products SET product_name = '".$n_product."',
			description = '".$n_description."', prod_type = '".$u_prodtype."',
			image = '".$imag."', image_path = '".$folder."', price = '".$n_price."', count_in_stock = '".$n_stock."'
			where product_id = $id";
			$update = mysqli_query($conn, $liveSqlQQ);	
			
			if($update)
			{
			    echo "Product updated successfully";
                header("Location: ../admin/product_details.php");
				
			}else
		    {
			$displayErrMessage = "Sorry, Unable to update";
		    }
   
        }else{
            echo "Error!!!";
    }
   
    
}

?>
<?php
session_start();
$admin = $_SESSION['admin_name'];
if (empty($admin)) {
  header('location:../index.php');
} else {
include_once '../db/config.php';
include_once '../model/category_retrieve.php';
?>
<?php include_once 'components/header.php';?>
  <div class="container-scroller d-flex">
    <?php include_once 'components/side_bar.php';?>  
    <div class="container-fluid page-body-wrapper">     
      <?php include_once 'components/nav_bar.php';?> 

     <div class="main-panel">        
       <div class="content-wrapper">
          <div class="row">             
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product Details Entry Form</h4>
                  <p class="card-description">
                    Enter the Product's Details
                  </p>
                  <form method="POST" action="../model/product_upload.php" enctype="multipart/form-data" class="forms-sample">
                  
                            
                  <div class="form-group">
                  <label for="exampleInputName1">Select the Category here</label>
                  <select name = "Category" id = "Category" >
                  <option>&nbsp; Select Category</option>
                  <?php
                    foreach ($categories as $category) {
                  ?>
                   <option value= "<?=$category['category_name'];?>"> &nbsp; <?php echo $category['category_name']; ?></option>

                   <?php 
                    }
                    ?>
                    </select>
                  </div>                   
                          
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control"  name="Pname" id ="Pname" placeholder="Product Name" Required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail3">Description</label>
                     <textarea class="form-control" rows="4" name="Description" id ="Description" Required></textarea>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputName1">Select the Product Type</label>
                    <select name = "prod_type" id = "prod_type" >
                    <option>&nbsp; Product Type</option>                    
                    <option value = "Recommanded">&nbsp; Recommanded</option>
                    <option value = "Fearured">&nbsp; Featured</option>
                    <option value = "General">&nbsp; General</option>
                    <option value = "Best Selling">&nbsp; Best Selling</option>
                    </select>
                    </div>   

                    <div class="form-group">
                      <label>Product Image</label>
                      <input type="file" name="image" id ="image" class="file-upload-default" Required accept="image/png, image/jpeg" >
                     <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" name="image"  id ="image" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Price</label>
                      <input type="text" class="form-control" id="Price" name="Price" placeholder="Price" Required>
                    </div>                                      
                    <div class="form-group">
                      <label for="exampleInputCity1">Count In Stock</label>
                      <input type="text" class="form-control" id="Stock" name = "Stock" placeholder="Count" Required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Date Created</label>
                      <input type="date" class="form-control" name = "Date" id="Date" placeholder="Date" Required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Quantity</label>
                      <input type="text" class="form-control" name = "Quantity" id="Quantity" placeholder="Quantity" Required>
                    </div>     
                    <div class="form-group">
                      <label for="exampleInputCity1">Minimum Quantity</label>
                      <input type="text" class="form-control" name = "minQuantity" id="minQuantity" placeholder="Minimum Quantity" Required>
                    </div>                  

                    <button type="submit" id ="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                 </form>
                </div>
              </div>
            </div>             
      </div>      
    </div>    
  </div>  
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>  
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/template.js"></script>  
  <script src="../assets/js/file-upload.js"></script>
  <script>
    const d = new Date();
    document.getElementById("date").innerHTML = d;
  </script>
<script>
        $(document).ready(function() {
 
            $("#submit").click(function() {
 
                let Category = $("#Category").val();
                let Pname = $("#Pname").val();
                let Description = $("#Description").val();
                let prod_type = $("#prod_type").val();
                let image = $("#image").val();
                let Price = $("#Price").val();
                let Stock = $("#Stock").val();
                let Date = $("#Date").val();
                let Quantity = $("#Quantity").val();
                let minQuantity = $("#minQuantity").val();
 
                if(Category ==''|| Pname ==''||Description ==''||prod_type == '' || image =='' ||Price =='' ||Stock=='' ||Date==''||Quantity=='' || minQuantity=='') {
                    alert("Please fill all fields.");
                    return false;
                }
 
                $.ajax({
                    type: "POST",
                    url: "../../../products/product_upload.php",
                    data: {
                      Category: Category,
                      Pname: Pname,
                      Description: Description,
                      prod_type: prod_type,
                      image:  image,
                      Price: Price,
                      Stock: Stock,
                      Date : Date,
                      Quantity: Quantity,
                      minQuantity: minQuantity

                    },
                    cache: false,
                    success: function(data) {
                        //alert(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
                 
            });
 
        });
    </script>
  
</body>

</html>
<?php } ?>
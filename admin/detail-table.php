<?php
session_start();
$admin = $_SESSION['admin_name'];
//echo $admin;
if (empty($admin)) {
  header('location:../index.php');
} else {
include_once '../db/config.php';
include_once '../model/product_retrieve.php';
include_once '../model/category_retrieve.php';
include_once '../model/order.php';
include_once '../model/shipping_add.php';

?>
<?php include_once 'components/header.php';?>
  <div class="container-scroller d-flex">
  <?php include_once 'components/side_bar.php';?>
    <div class="container-fluid page-body-wrapper">     
     <?php include_once 'components/nav_bar.php';?>  

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card" id="t-tab1" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product Details</h4>               
                   <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Product ID</th>
                          <th>Category ID</th>
                          <th>Category Name</th>
                          <th>Product Name</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Price</th>
                          <th>In Stock</th>
                          <th>Date Created</th>
                          <th>Quantity</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if($result1->num_rows> 0){
                       foreach ($products as $product) {
                        ?>
                        <tr>
                          <td><?php echo $product["product_id"]; ?></td>
                          <td><?php echo $product["category_id"]; ?></td>
                          <td><?php echo $product["category_name"]; ?></td>
                          <td><?php echo $product["product_name"]; ?></td>
                          <td><?php echo $product["description"]; ?></td>
                          <td><?php echo '<img src = "data:image;base64,'.base64_encode($product['image']).'" alt ="image" style="width:100px; height:100px;">'; ?></td>
                          <td><?php echo $product["price"]; ?></td>
                          <td><?php echo $product["count_in_stock"]; ?></td>
                          <td><?php echo $product["created_date"]; ?></td>
                          <td><?php echo $product["quantity"]; ?></td>
                          
                        </tr>    
                        <?php
                      }
                    } else{
                      echo "<p style='color:red; font-size: 16px;'> No Products </p>";
                    }
                      ?>                    
                      </tbody>
                    
                    </table>
                    
                  </div>
                  
                </div>
                
              </div>
            </div>  
            
            <div class="col-lg-12 grid-margin stretch-card" id="t-tab2" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Categories</h4>                  
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Category ID</th>
                          <th>Category Name</th>
                          <th>Category Image</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                     if($result2->num_rows> 0){
                    foreach ($categories as $category) {
                        ?>
                        <tr>
                          <td><?php echo $category['category_id']; ?></td>
                          <td><?php echo $category['category_name']; ?></td>
                          <td><?php echo '<img src = "data:image;base64,'.base64_encode( $category['category_image']).'" alt ="image" style="width:100px; height:100px; border-radius:50px;">'; ?></td>
                        </tr>
                        <?php
                      }
                    }else{
                      echo "<p style='color:red; font-size: 16px;'>No Categories</p>";
                    }
                     ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card" id="t-tab3" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order Details</h4>                 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Customer ID</th>
                          <th>Product Name</th>
                          <th>Catergory Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Appalam Image</th>
                          <th>Order Status</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php
                     if($result3->num_rows> 0){
                    foreach ($orders as $order) {
                        ?>
                        <tr>
                          <td><?php echo $order['order_id']; ?></td>
                          <td><?php echo $order['customer_id']; ?></td>
                          <td><?php echo $order['product_name']; ?></td>
                          <td><?php echo $order['category_name']; ?></td>
                          <td><?php echo $order['price']; ?></td>
                          <td><?php echo $order['quantity']; ?></td>
                          <td><?php echo '<img src = "'.$order['appalam_image'].'" alt ="image" style="width:100px; height:100px; border-radius:50px;">';?></td>                          
                          <td><?php echo $order['status']; ?></td>
                        </tr>  
                        <?php
                      }
                    }else{
                      echo "<p style='color:red; font-size: 16px;'>No Orders</p>";
                    }
                     ?>                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-12 grid-margin stretch-card" id="t-tab4" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Shipping Details</h4>
                   <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Customer ID</th>
                          <th>Customer Name</th>
                          <th>Email ID</th>
                          <th>Street</th>
                          <th>Apartment</th>
                          <th>City</th>
                          <th>Pin Code</th>
                          <th>Country</th>
                          <th>Phone</th>
                          <th>Payment Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                     if($result4->num_rows> 0){
                    foreach ($shippings as $shipping) {
                        ?>
                        <tr>
                          <td><?php echo $shipping['order_id']; ?></td>
                          <td><?php echo $shipping['customer_id']; ?></td>
                          <td><?php echo $shipping['customer_name']; ?></td>
                          <td><?php echo $shipping['customer_email']; ?></td>
                          <td><?php echo $shipping['address1']; ?></td>
                          <td><?php echo $shipping['address2']; ?></td>
                          <td><?php echo $shipping['city']; ?></td>
                          <td><?php echo $shipping['pincode']; ?></td>
                          <td><?php echo $shipping['country']; ?></td>
                          <td><?php echo $shipping['phone']; ?></td>
                          <td><?php echo $shipping['payment_status']; ?></td>
                        </tr>
                        <?php
                      }
                    }else{
                      echo "<p style='color:red; font-size: 16px;'>No Shippment</p>";
                    }
                     ?>     
                      </tbody>
                    </table>
                  </div>
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
  <script>
    const d = new Date();
    document.getElementById("date").innerHTML = d;
  </script>  
</body>

</html>
<?php } ?>
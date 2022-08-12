<?php
session_start();
$admin = $_SESSION['admin_name'];
//echo $admin;
if (empty($admin)) {
  header('location:../index.php');
} else {
include_once '../db/config.php';
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
                      echo "<p style='color:red; font-size: 16px;'>No Shippments</p>";
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
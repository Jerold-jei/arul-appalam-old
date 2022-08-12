<?php
session_start();
$admin = $_SESSION['admin_name'];
//echo $admin;
if (empty($admin)) {
  header('location:../index.php');
} else {
include_once '../db/config.php';
include_once '../model/payment.php';

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
                  <h4 class="card-title">Payment History</h4>               
                   <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>S NO</th>                         
                          <th>Customer Name</th>
                          <th>Customer Email ID</th>
                          <th>Payment Status</th>
                          <th>Payment ID</th>
                          <th>Payment Date</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if($result->num_rows> 0){
                       foreach ($payments as $payment) {
                        ?>
                        <tr>
                          <td><?php echo $payment["id"]; ?></td>                        
                          <td><?php echo $payment["customer_name"]; ?></td>
                          <td><?php echo $payment["customer_email"]; ?></td>
                          <td><?php echo $payment["payment_status"]; ?></td>
                          <td><?php echo $payment['payment_id']; ?></td>
                          <td><?php echo $payment["added_on"]; ?></td>
                          
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
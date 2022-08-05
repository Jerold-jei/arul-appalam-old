<?php
session_start();
$admin = $_SESSION['admin_name'];
if (empty($admin)) {
  header('location:../index.php');
} else {

include_once '../db/config.php';
include_once '../model/adminDetails.php';

if($result->num_rows> 0){
foreach ($admins as $admin1) {
                        
?>
<?php include_once 'components/header.php';?>
  <div class="container-scroller d-flex">
  <?php include_once 'components/side_bar.php';?>  
    <div class="container-fluid page-body-wrapper">     
    <?php include_once 'components/nav_bar.php';?>  

      <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Admin Details</h4>                 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Admin ID
                          </th>
                          <th>
                            Admin Name
                          </th>
                          <th>
                            Username
                          </th>
                          <th>
                            Phone
                          </th>                        
                        </tr>
                      </thead>
                      <tbody>
                      
                        <tr>
                        <td><?php echo $admin1["admin_id"]; ?></td>
                          <td><?php echo $admin1["admin_name"]; ?></td>
                          <td><?php echo $admin1["username"]; ?></td>
                          <td><?php echo $admin1["phone"]; ?></td>
                        </tr>
                        <?php
                      }
                    } else{
                      echo "<p style='color:red; font-size: 16px;'> No Admin </p>";
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
  <?php include_once 'components/footer.php';

 } ?>
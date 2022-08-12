<?php
session_start();
$admin = $_SESSION['admin_name'];
//echo $admin;
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Categories</h4>                  
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <!-- <th>Category ID</th> -->
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
                          <!-- <td><?php //echo $category['category_id']; ?></td> -->
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
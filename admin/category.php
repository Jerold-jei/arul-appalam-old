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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Category Entry</h4>                                
                  <form class="form-inline" method="POST" action = "../model/categoryinsert.php" enctype="multipart/form-data" >
                  
                    <label style="padding: 5px;">Enter Category Name</label>
                    <input type="text" class="form-control" name = "category_name" id="category_name" Required placeholder="Enter Category Name"> <br/>
                    
                    <div class="input-group">
                   <label style="padding: 5px;">Category Image</label>                  
                   
                        <input type="file" class="form-control file-upload-info" name="category_image"  id ="category_image" Required accept="image/png, image/jpeg" placeholder="Upload Image">
                                             
                    <br>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button></div>
                  </form>
                </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category</h4>                  
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                      <thead>
                        <tr>
                         
                          <th style="display:none;"></th>
                          <th>Category Name</th>
                          <th>Category Image</th>
                          <th>Edit</th>                      
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                     if($result2->num_rows> 0){
                    foreach ($categories as $category) {
                        ?>
                        <tr>
                          <td style="display:none;"><?php echo $category['category_id']; ?> </td>
                          <td> <?php echo $category['category_name']; ?></td>
                          <td> <?php echo '<img src = "data:image;base64,'.base64_encode( $category['category_image']).'" alt ="image" style="width:100px; height:100px; border-radius:50px;">'; ?></td>
                          <td><a class="btn" type="button" style="" href="../model/category_delete.php?delete_id=<?php echo $category['category_id'];?>" onClick="return confirm('Do you want to delete this Category?')" type="button">
                          <i class="mdi mdi-delete" style="font-size:25px; color:#000; "></i></a>
                          <a class="btn updatebtn" type="button" >
                          <i class="mdi  mdi-package-up" style="font-size:25px; color:#000;"></i></a></td>

                        </tr>
                        <?php
                      }
                    }else{
                      echo "No Categories";
                    }
                     ?>
                      </tbody>
                    </table>

                                  
      <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Category Update </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../model/update_category.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="category_id" id="category_id">

                        <div class="form-group">
                            <label> Category Name </label>
                            <input type="text" name="n_category" id="n_category" class="form-control"
                                placeholder="Enter Category Name">
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" id = "update" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
                 
                   
                  </div>
                </div>
              </div>
            </div>           
      </div>      
    </div>
    </div>  
  <script src="../../vendors/js/vendor.bundle.base.js"></script>  
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>  
  <script src="../../js/file-upload.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

  <script>
    const d = new Date();
    document.getElementById("date").innerHTML = d;
  </script>
  
  <script>
//     $(document).ready(function() {
 
//  $("#submit").click(function() {

//      let category_name = $("#category_name").val();
//      let category_image = $("#category_image").val();
     

//      if(category_name ==''|| category_image =='') {
//          alert("Please fill all fields.");
//          return false;
//      }

//      $.ajax({
//          type: "POST",
//          url: "../model/categoryinsert.php",
//          data: {
//           category_name: category_name,
//           category_image: category_image

//          },
//          cache: false,
//          success: function(data) {
             
//          },
//          error: function(xhr, status, error) {
//              console.error(xhr);
//          }
//      });
      
//  });
 

// });
  </script>
  <script>
  
  $(document).ready(function(){
    $('.updatebtn').on('click', function(){

      $("#updatemodal").modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function () {
          return $(this).text();
      }).get();

      console.log(data);

      $('#category_id').val(data[0]);
      $('#n_category').val(data[1]);
      
    });
  });

//     $(document).ready(function() {
 
//  $("#update").click(function(e) {

     
//      let n_category = $("#n_category").val();
//      let category_id = $("#category_id").val();
     
//      if(n_category =='') {
//          alert("Please fill the field.");
//          return false;
//      }

//      $.ajax({
//          type: "POST",
//          url: "../model/update_category.php",
//          data: {
//           category_id: category_id,
//           n_category: n_category

//          },
//          cache: false,
//          success: function(data) {
             
//          },
//          error: function(xhr, status, error) {
//              console.error(xhr);
//          }
//      });

          
//  });
// });
  </script>  
</body>

</html>
<?php } ?>
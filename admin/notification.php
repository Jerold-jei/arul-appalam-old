<?php
session_start();
$admin = $_SESSION['admin_name'];
//echo $admin;
if (empty($admin)) {
  header('location:../index.php');
} else {
include_once '../db/config.php';
include_once '../model/retrieve_notification.php';
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
                  <h4 class="card-title">Notifications</h4>                  
                  <form class="forms-sample" action="../model/upload_notification.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="exampleInputUsername1">Notification Title </label>
                      <input type="text" class="form-control" id = "notification_title" name = "notification_title" placeholder="Enter Notification Title" required>
                    </div>  
                  <div class="form-group">
                      <label for="exampleInputUsername1">Enter Notification Here</label>
                      <input type="text" class="form-control" id = "notification" name = "notification" placeholder="Enter Notification" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Valid Date</label>
                      <input type="date" class="form-control" id="valid_date" name="valid_date" placeholder="Valid Date" required>
                    </div>

                    <div class="form-group">
                      <label>Notification Image</label>
                      <input type="file" name="image" id ="image" class="file-upload-default" Required accept="image/png, image/jpeg" >
                     <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" name="image"  id ="image" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>                   
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                    <button class="btn btn-danger">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Notification Preview</h4>
                 
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th style="display:none;">Notifications ID </th>
                          <th>Notifications Title </th>
                          <th>Notification</th>
                          <th>Image</th>
                          <th>Preview</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if($result->num_rows> 0){
                       foreach ($notifications as $notification) {
                        ?>
                        <tr>
                          <td style="display:none;"><?php echo $notification["notification_id"]; ?></td>
                          <td><?php echo $notification["notification_title"]; ?></td>
                          <td><?php echo $notification["notification"]; ?></td>
                          <td><?php echo '<img src = "data:image;base64,'.base64_encode($notification['notification_image']).'" alt ="image" style="width:100px; height:100px;">'; ?></td>
                          <td><a class="btn btn-info preview" type="button" >
                          <i class="mdi mdi-message-text" style="font-size:25px"></i></a></td>                       
                        </tr>    
                        <?php
                      }
                    } else{
                      echo "<p style='color:red; font-size: 16px;'> No Notifications </p>";
                    }
                      ?>                    
                      </tbody>
                    
                    </table>

        <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Notification Preview </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>              

                    <div class="modal-body">

                        <div class="form-group">
                        <label> Notification Title </label>
                        <input type="text" name="category_id" id="category_id" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Notification Message </label>
                            <input type="text" name="n_category" id="n_category" class="form-control">
                        </div>

                        <div class="form-group">                                  
                            <label> Notification Image </label>  
                            <img src = "<?php echo $notification['image_path'];?>" name="image" id="image" alt ="image" style="width:100px; height:100px;">

                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Okay</button>
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
 
            $("#submit").click(function(e) {

                e.preventDefault();
                let notification_title = $("#notification_title").val();
                let notification = $("#notification").val();
                let valid_date = $("#valid_date").val();
              
                if(notification_title == '' || notification ==''|| valid_date =='') {
                    alert("Please fill all fields.");
                    return false;
                }
 
                $.ajax({
                    type: "POST",
                    url: "../../../upload_notification.php",
                    data: {
                        notification_title: notification_title,
                        notification: notification,
                        valid_date: valid_date
                    
                    },
                    cache: false,
                    success: function(data) {
                        alert(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
                 
            });
 
        });
    </script>
    <script>
        $(document).ready(function(){
    $('.preview').on('click', function(){

      $("#updatemodal").modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function () {
          return $(this).text();
      }).get();     

      console.log(data);

      $('#category_id').val(data[1]);
      $('#n_category').val(data[2]);
      $('#image').val(data[3]);
      
    });
  });
    </script>
  
</body>

</html>
<?php } ?>
<?php
session_start();
$admin = $_SESSION['admin_name'];
if (empty($admin)) {
  header('location:../index.php');
} else {

  include_once '../db/config.php';
include_once '../model/banner_retrieve.php';

$sql = "SELECT image_id FROM banner image_id"; 
$result = mysqli_query($conn, $sql);

?>

<?php include_once 'components/header.php';?>
  <div class="container-scroller d-flex">
  <?php include_once 'components/side_bar.php';?>
    <div class="container-fluid page-body-wrapper">     
    <?php include_once 'components/nav_bar.php';?>  
     
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="file-upload">
            <form action="../model/banner_upload.php" enctype="multipart/form-data" class="forms-sample" method="POST">
              <div class="file-select">
                <div class="file-select-button" id="fileName">Choose File</div>
                <div class="file-select-name" id="noFile">No file chosen...</div>
                <input type="file" name="userImage" id="image" accept="image/jpeg">

              </div> <br>
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" style="height: auto; width: 100px;" type="submit" id="submit">ADD</button></span>
            </form>
          </div>
          <center>
            <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">
              Banner
            </h4>

            <hr class="my-5">

            

            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" style="width: auto; height:auto;">


              <div class="carousel-inner">
                <?php

                $count = 0;
                if($result->num_rows> 0){
                  while($row = mysqli_fetch_array($result)) { ?>

                  <div class="carousel-item <?php
                                            if ($count == 0) {
                                              echo "active";
                                            } else {
                                              echo " ";
                                            }
                                            ?>" data-interval="2000">
                    <img src="../model/banner_retrieve.php?image_id=<?php echo $row["image_id"];  ?>" class="card-img-top" id="img" alt="...">
                   <a class="btn btn-link" style="text-align:right; width:auto; height:auto; color:#fff; font-size:20px; border:0; border-radius:100px; background: #CE034E; padding:10px; margin-top:10px; display: inline-flex;" href="../model/banner_delete.php?delete_id=<?php echo $row["image_id"];  ?>" onClick="return confirm('Are you sure to delete this Banner?')" type="button">
                   Delete <i class="mdi mdi-delete" style="font-size:20px; padding-left:5px;"></i></a>
                   </div>
                <?php
                  $count++;
                }
              } else{
                echo "No Banners";
                 }
                ?>
              </div>



              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>      

        </div>       
      </div>     
    </div>    
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>    
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/template.js"></script>   
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>    
    <script src=".../assets/js/chart.js"></script>
    <script src=".../assets/js/banner.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
   
    <script>
      $('#image').bind('change', function() {
        let image = $("#image").val();
        if (/^\s*$/.test(image)) {
          $(".file-upload").removeClass('active');
          $("#noFile").text("No file chosen...");
        } else {
          $(".file-upload").addClass('active');
          $("#noFile").text(image.replace("C:\\fakepath\\", ""));
        }
      });

      $(document).ready(function() {

        $("#submit").click(function() {

          let image = $("#image").val();


          if (image == '') {
            alert("Please Add the Image.");
            return false;
          } else {

            $.ajax({
              type: "POST",
              url: "../../../Image_upload.php",
              data: {

                image: image,
              },
              cache: false,
              success: function(data) {
                // alert(data);
              },
              error: function(xhr, status, error) {
                console.error(xhr);
              }
            });
          }
        });

      });
    </script>    

    <script>
      const d = new Date();
      document.getElementById("date").innerHTML = d;
    </script>
</body>
</html>
<?php } ?>
<?php
session_start();
$admin = $_SESSION['admin_name'];
//echo $admin;
if (empty($admin)) {
  header('location:../index.php');
} else {
include_once '../db/config.php';
include_once '../model/discount_retrieve.php';
?>
<?php include_once 'components/header.php';?>
  <div class="container-scroller d-flex">   
  <?php include_once 'components/side_bar.php';?>    
    <div class="container-fluid page-body-wrapper">
    <?php include_once 'components/nav_bar.php';?>        
      <div class="main-panel">        
       <div class="content-wrapper">
          <div class="row">             
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Coupons</h4>
                  <form class="form-sample" id = "coup_entry" action="../model/prod_discount.php" method="POST" enctype="multipart/form-data">
                    <p class="card-description">
                      Discount Details
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Coupon Title</label>
                          <div class="col-sm-9">
                            <input type="text" name = "coupon_title" id = "coupon_title" class="form-control" Required/>
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Discount %</label>
                          <div class="col-sm-9">
                            <input type="text" name = "discount" id = "discount" class="form-control" Required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Expiry Date</label>
                          <div class="col-sm-9">
                            <input type = "date" name = "exp_date" id = "exp_date" class="form-control" Required/>
                          </div>
                        </div>
                      </div>
                    </div>                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Coupon Details</label>
                          <div class="col-sm-9">
                            <input type="text" name = "coup_details" id = "coup_details" class="form-control" Required/>
                          </div>
                        </div>
                      </div>               
                    </div>                   
                    <button type="submit" id = "submit" class="btn btn-info mb-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Coupon Details</h4>                                  
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Coupon ID</th>
                          <th>Coupon Title</th>
                          <th>Discount</th>
                          <th>Expiry Date</th>
                          <th>Coupon Details</th>
                          <th>Coupon Status</th>
                          <th>Activate Coupon</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if($result->num_rows> 0){
                       foreach ($coupons as $coupon) {
                        ?>
                        <tr>
                          <td><?php echo $coupon["coupon_id"]; ?></td>
                          <td><?php echo $coupon["coupon_title"]; ?></td>
                          <td><?php echo $coupon["discount"]; ?>%</td>
                          <td><?php echo $coupon["exp_date"]; ?></td>
                          <td><?php echo $coupon["coup_details"]; ?></td>   
                          <td><?php echo $coupon["coup_activate"]; ?></td>   
                          <td><a class="btn btn-info updatebtn" type="button" >
                          <i class="mdi  mdi-package-up" style="font-size:25px"></i></a></td>                          
                         
                        </tr>    
                        <?php
                      }
                    } else{
                      echo "<p style='color:red; font-size: 16px;'> No Coupons </p>";
                    }
                      ?>                    
                      </tbody>
                    
                    </table>
                                                 
                    <div class="modal fade" id="updatemodal1" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"> Activate Coupon </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>

                              <form action="../model/update_discount.php" method="POST">

                                  <div class="modal-body">
                                    
                                    <div class="form-group">
                                      <label> Coupon ID </label>
                                      <input type="text" name="coupon_id" id="coupon_id" class="form-control">
                                    </div>

                                      <div class="form-group">
                                          <label> Coupon Title </label>
                                          <input type="text" name="n_category" id="n_category" class="form-control"
                                              placeholder="Enter Coupon">
                                      </div>                                     
                                                                        
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      <button type="submit" name = "updateoff"  id = "updateoff" class="btn btn-info">Disable Coupon</button>
                                      <button type="submit" name = "update" id = "update" class="btn btn-primary">Enable Coupon</button>
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
    $(document).ready(function(){
    $("input[name='discount']").on('input', function() {
    $(this).val(function(i, v) {
     return v.replace('%','') + '%';  });
    });
});


  </script>
<script>
        $(document).ready(function() {

            $(function() {
              $('#coup_activate').bootstrapToggle({
                on: 'On',
                off: 'Off'
                });
            });

          $('#coup_activate').click(function(event){

              event.preventDefault(); 
              if($(this).prop('checked'))
              {
                let coup_activate = document.getElementById('coup_activate').val('On');
              }
              else
              {
                let coup_activate = document.getElementById('coup_activate').val('Off');
              }
           });

           $('#coup_entry').on('submit', function(){
            
                let coupon_title = $('#coupon_title').val();
                let discount = $('#discount').val();
                let exp_date = $('#exp_date').val();
                let coup_details = $('#coup_details').val();              
                
                                
                if(coupon_title ==''|| discount ==''|| exp_date ==''|| coup_details =='') {
                    alert("Please fill all fields.");
                    return false;
                }else{
                
                $.ajax({
                    type: "POST",
                    url: "../../../discount/prod_discount.php",
                    data: {
                      coupon_title : coupon_title,
                      discount : discount,
                      exp_date : exp_date,
                      coup_details : coup_details
                     
                    },
                    
                    cache: false,
                    success: function(data) {
                      if(data == 'done')
                      {
                      $('#coup_entry')[0].reset();
                     
                      }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
              }
            });
 
        });
        
        $(document).ready(function(){
    $('.updatebtn').on('click', function(){

      $("#updatemodal1").modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function () {
          return $(this).text();
      }).get();

      console.log(data);

      $('#coupon_id').val(data[0]);
      $('#n_category').val(data[1]);
      
    });
  });

  $(document).ready(function() {
 
 $("#update").click(function(e) {

     
     let n_category = $("#n_category").val();
     let coupon_id = $("#coupon_id").val();   

     if(n_category =='') {
         alert("Please fill the field.");
         return false;
     }

     $.ajax({
         type: "POST",
         url: "../../../discount/update_discount.php",
         data: {
          coupon_id: coupon_id,
          n_category: n_category

         },
         cache: false,
         success: function(data) {
            

         },
         error: function(xhr, status, error) {
             console.error(xhr);
         }
     });

       
 });
});

$(document).ready(function() {
 
 $("#updateoff").click(function(e) {
     
     let n_category = $("#n_category").val();
     let coupon_id = $("#coupon_id").val();
     

     if(n_category =='') {
         alert("Please fill the field.");
         return false;
     }

     $.ajax({
         type: "POST",
         url: "../../../update_discount.php",
         data: {
          coupon_id: coupon_id,
          n_category: n_category

         },
         cache: false,
         success: function(data) {
            

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
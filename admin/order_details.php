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
include_once '../model/ordered_customers.php';


?>
<?php include_once 'components/header.php';?>
  <div class="container-scroller d-flex">
  <?php include_once 'components/side_bar.php';?>
    <div class="container-fluid page-body-wrapper">     
     <?php include_once 'components/nav_bar.php';?>  

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card" id="t-tab3" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order Details</h4>                 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>S No</th>
                          <th>Customer Details </th>
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
                          <td class="sno"></td>
                          <td><a class="btn btn-secondary view" style="color: #fff; font-size: 15px; border: 0; border-radius: 100px;" data-toggle="modal" data-target="#myModal" href="../model/ordered_customers.php?customer_id?=<?php echo $order['customer_id']; ?>" onClick="" type="button">
                   View </a></td>
                          <td><?php echo $order['product_name']; ?></td>
                          <td><?php echo $order['category_name']; ?></td>
                          <td><?php echo $order['price']; ?></td>
                          <td><?php echo $order['quantity']; ?></td>
                          <td><?php echo '<img src = "'.$order['appalam_image'].'" alt ="image" style="width:100px; height:100px; border-radius:50px;">';?></td>                          
                          <td><?php echo $order['status']; ?><a class="btn" style="" data-toggle="modal" data-target="#orderStatus" href="../model/order_update.php?customer_id?=<?php echo $order['customer_id']; ?>" onClick="" type="button">
                          <i class="mdi  mdi-package-up" style="font-size:25px; color:#000;"></i></a></td>
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
      </div> 
      
     
      <div class="modal fade bd-example-modal-lg"  id="myModal" tabindex="-1" role="dialog"  data-backdrop="static" data-keyboard="false" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Customer Details </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                          <div class="modal-body">
                            
                               <table class="table table-striped">
                              <thead>
                              <tr>
                                    <th>Customer Name </th>
                                    <th>Customer Email </th> 
                                    <th>Address </th>                               
                                    <th>Mobile Number </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                 
                                  if (isset($_GET["customer_id"])) {
                                  
                                    $id = $_GET["customer_id"];
                                   
                                    $query = "SELECT * FROM customers where customer_id = $id";
                                       
                                    $Result1 =  $conn->query($query);
                                    $ordered_customers =  mysqli_fetch_all($Result1, MYSQLI_ASSOC);   

                                    if($Result1->num_rows> 0){
                                    foreach ($ordered_customers as $ordered_customer) {
                                    ?>
                                  <tr>
                                  <td><?php echo $ordered_customer['customer_name']; ?></td>
                                  <td><?php echo $ordered_customer['customer_email']; ?></td>
                                  <td><?php echo $ordered_customer['address']?></td>                                  
                                  <td><?php echo $ordered_customer['phone']; ?></td>
                                  </tr>
                                  <?php
                                    }
                                  }else{
                                    echo "<p style='color:red; font-size: 16px;'>No Customer Details</p>";
                                  }
                               }
                                  ?>     
                                  </tbody>
                              </table>
                           
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="" name="" id="" class="btn btn-primary">Print Data</button>
                            </div>
      </div>
      </div>
      </div>

      <div class="modal fade bd-example"  id="orderStatus" tabindex="-1" role="dialog"  data-backdrop="static" data-keyboard="false" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Update Order Status </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                          <div class="modal-body">
                          <form action="../model/up_orderStatus.php" method="POST">

                          <input type="hidden" name="order_id" id="order_id" value="<?php echo $order['order_id']; ?>">

                          <div class="form-group">
                                <label for="exampleInputName1">Select Order Status</label>
                                <select name="order_status" id="order_status">
                                  <option>&nbsp; Select Order Status</option>
                                  
                                    <option value="Ordered"> &nbsp; Ordered</option>
                                    <option value="Dispatched"> &nbsp; Dispatched</option>
                                    <option value="Delivered"> &nbsp; Delivered </option>
                                  </select>
                              </div>
                           </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
                            </div>
                          </form>
      </div>
      </div>
      </div>
    </div>    
  </div> 
  
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>  
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/template.js"></script>

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
        var addSerialNumber = function() {
          $('table tr').each(function(index) {
            $(this).find('td.sno:nth-child(1)').html(index);
          });
        };
        addSerialNumber();
      </script>
  <script>
    
  // $(document).ready(function(){
  //   $('.updatebtn').on('click', function(){

  //     $("#updatemodal").modal('show');

  //     $tr = $(this).closest('tr');

  //     var data = $tr.children("td").map(function () {
  //         return $(this).text();
  //     }).get();

  //     console.log(data);

  //     $('#category_id').val(data[0]);
  //     $('#n_category').val(data[1]);
      
  //   });
  // });
  </script> 

</body>

</html>
<?php } ?>
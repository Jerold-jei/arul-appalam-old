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
  <?php include_once 'components/header.php'; ?>
  <style>

  </style>
  <div class="container-scroller d-flex">
    <?php include_once 'components/side_bar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include_once 'components/nav_bar.php'; ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-md-12 head" style="margin-bottom: 20px; ">
              <div class="float-right">
                <a class="btn btn-primary btn-lg" href="../model/order_export.php" role="button" style="font-size:20px;">Export <i class="mdi mdi-download" style="font-size:20px;"></i></a>
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
                          <th>S No</th>
                          <th>Customer Details </th>
                          <th>Product Name</th>
                          <th>Catergory Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Appalam Image</th>
                          <th colspan="2">Order Status</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if ($result3->num_rows > 0) {
                          foreach ($orders as $order) {
                        ?>
                            <tr>
                              <td class="sno"></td>
                              <td><button class="btn btn-secondary view" style="color: #fff; font-size: 15px; border: 0; border-radius: 100px;" data-toggle="modal" data-target="#myModal" onClick="set_modal_values('<?php echo $order['customer_id']; ?>')" type="button">
                                  View </button></td>
                              <td><?php echo $order['product_name']; ?></td>
                              <td><?php echo $order['category_name']; ?></td>
                              <td><?php echo $order['price']; ?></td>
                              <td><?php echo $order['quantity']; ?></td>
                              <td onClick="set_papad_image('<?php echo $order['order_id']; ?>')"><?php echo '<img data-toggle="modal" data-target="#Image_flip" id="image" src = "' . $order['appalam_image'] . '" alt ="image" style="width:100px; height:100px; border-radius:50px;">'; ?></td>

                              <td> <?php
                                    switch ($order['status']) {
                                      case "ordered":
                                        echo "<span class='text-primary font-weight-bold'>" . $order['status'] . "</span>";
                                        break;
                                      case "dispatched":
                                        echo "<span class='text-warning font-weight-bold'>" . $order['status'] . "</span>";
                                        break;
                                      case "delivered":
                                        echo "<span class='text-success font-weight-bold'>" . $order['status'] . "</span>";
                                        break;
                                      case "holded":
                                        echo "<span class='text-danger font-weight-bold'>" . $order['status'] . "</span>";
                                        break;
                                      default:
                                        echo "";
                                    }
                                    ?>
                              </td>
                              <td>
                                <span class="btn" data-toggle="modal" data-target="#orderStatus" onclick="set_order_id('<?php echo $order['order_id']; ?>')">
                                  <i class="mdi mdi-pencil"></i>
                                </span>
                              </td>

                            </tr>
                        <?php
                          }
                        } else {
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


          <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="font-size: 25px; font-weight:bold;"> Customer Details </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="font-size: 25px; font-weight:bold;">Customer Name </th>
                        <th style="font-size: 25px; font-weight:bold;">Customer Email </th>
                        <th style="font-size: 25px; font-weight:bold;">Mobile Number </th>
                        <th style="font-size: 25px; font-weight:bold;">Address </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td id="customer-name" class="text-capitalize" style="font-size: 25px;"></td>
                        <td id="customer-email" style="font-size: 25px;"></td>
                        <td id="customer-phone" style="font-size: 25px;"></td>
                        <td id="customer-address" style="font-size: 25px;"></td>
                      </tr>
                    </tbody>
                  </table>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" name="" id="" class="btn btn-primary" data-dismiss="modal">Okay</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade bd-example" id="orderStatus" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Update Order Status </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- <form action="../model/up_orderStatus.php" method="POST"> -->

                  <input type="hidden" name="order_id" id="order_id" value="<?php echo $order['order_id']; ?>">

                  <div class="form-group">
                    <label for="exampleInputName1">Select Order Status</label>
                    <select name="order_status" id="order_status" required>
                      <option value="empty" disabled selected>&nbsp; Select Order Status</option>
                      <option value="ordered"> &nbsp; Ordered</option>
                      <option value="dispatched"> &nbsp; Dispatched</option>
                      <option value="delivered"> &nbsp; Delivered </option>
                      <option value="holded"> &nbsp; Holded </option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <span id="order-id" class="d-none"></span>
                  <button type="submit" onClick="change_order_status()" class="btn btn-primary">Update</button>
                </div>
                <!-- </form> -->
              </div>
            </div>
          </div>

          <div class="modal fade bd-example" id="Image_flip" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Print Appalam Image </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="p_image">
                  <img id="papad_image" alt="image">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <span id="order-id" class="d-none"></span>
                  <button type="submit" onclick="print('p_image')" class="btn btn-primary">Print Image</button>
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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

      <script>
        //set-modal-value

        function set_modal_values(modal_data) {
          $.post('../model/ordered_customers.php', {
            get_customer_details: modal_data
          }, (response) => {
            let customer = $.parseJSON(response);
            $('#customer-name').html(customer[0].customer_name);
            $('#customer-email').text(customer[0].customer_email);
            $('#customer-phone').text(customer[0].phone);
            $('#customer-address').text(customer[0].address);

          })
        }

        function set_papad_image(modal_id) {
          $.post('../model/papad_image.php', {
            get_papad_image: modal_id
          }, (response) => {
            let papad_image = $.parseJSON(response);
            $('#papad_image').attr("src", papad_image[0].appalam_image);

            let count = 0;
            $("#papad_image").on("click", function() {
              count++;
              if (count == 1) {
                $(this).clone().insertAfter(this);
                $(this).css("transform", "rotateY(180deg)");
                $(this).attr("src", papad_image[0].appalam_image);
              } else {
                console.log(count);
              }
            })
          })
        }

        function set_order_id(order_id) {
          $('#order-id').text(order_id);
        }

        function change_order_status() {
          let order_id = $("#order-id").text();
          let order_status = $('#order_status').find(":selected").val();
          if (order_status !== "empty") {
            $.post('../model/up_orderStatus.php', {
              get_order_status: {
                'order_id': order_id,
                'order_status': order_status
              }
            }, (response) => {
              if (response) {
                location.reload();
              } else {
                alert("Status not updated!")
              }
            })

          } else {
            alert("Please choose any option");
          }

        }


        const d = new Date();
        document.getElementById("date").innerHTML = d;

        var addSerialNumber = function() {
          $('table tr').each(function(index) {
            $(this).find('td.sno:nth-child(1)').html(index);
          });
        };
        addSerialNumber();

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
        function print(p_image) {
          var mywindow = window.open();
          var content = document.getElementById(p_image).innerHTML;
          //var realContent = document.body.innerHTML;         
          mywindow.document.write(content);
          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/
          mywindow.print();
          //document.body.innerHTML = realContent;
          //mywindow.close();
          return true;
        
        }
      </script>

      </body>

      </html>
    <?php } ?>
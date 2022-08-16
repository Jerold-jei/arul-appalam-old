<?php
session_start();
$admin = $_SESSION['admin_name'];
if (empty($admin)) {
  header('location:../index.php');
} else {
  include_once '../db/config.php';
  include_once '../model/product_retrieve.php';

?>
  <?php include_once 'components/header.php'; ?>
  <div class="container-scroller d-flex">
    <?php include_once 'components/side_bar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include_once 'components/nav_bar.php'; ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card" id="t-tab1" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product Details</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>S No</th>
                          <th style="display:none;">Product ID</th>
                          <th>Product Name</th>
                          <th>Description</th>
                          <th>Product Type</th>
                          <th>Image</th>
                          <th>Price</th>
                          <th>In Stock</th>
                          <th>Quantity</th>
                          <th>Edit</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if ($result1->num_rows > 0) {
                          foreach ($products as $product) {
                        ?>
                            <tr>
                              <td></td>
                              <td  style="display:none;"><?php echo $product["product_id"]; ?></td>
                              <td><?php echo $product["product_name"]; ?></td>
                              <td><?php echo $product["description"]; ?></td>
                              <td><?php echo $product["prod_type"]; ?></td>
                              <td><?php echo '<img src = "' . ($product['image_url']) . '" alt ="image" style="width:100px; height:100px;">'; ?></td>
                              <td><?php echo $product["price"]; ?></td>
                              <td><?php echo $product["count_in_stock"]; ?></td>
                              <td><?php echo $product["quantity"]; ?></td>
                              <td>
                                <a class="btn" type="button" style="" href="../model/product_delete.php?delete_id=<?php echo $product["product_id"]; ?>" onClick="return confirm('Do you want to delete this Product?')" type="button">
                                  <i class="mdi mdi-delete" style="font-size:25px; color:#000;"></i></a>
                                <a class="btn updatebtn" type="button">
                                  <i class="mdi  mdi-package-up" style="font-size:25px; color:#000;"></i></a></td>
                            </tr>
                        <?php
                          }
                        } else {
                          echo "<p style='color:red; font-size: 16px;'> No Products </p>";
                        }
                        ?>
                      </tbody>

                    </table>

                    <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Product Update </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <form action="../model/update_products.php" method="POST">

                            <div class="modal-body">

                              <input type="hidden" name="product_id" id="product_id">

                              <div class="form-group">
                                <label> Product Name </label>
                                <input type="text" name="product" id="product" class="form-control" placeholder="Enter Product Name">
                              </div>
                              <div class="form-group">
                                <label> Description </label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description">
                              </div>
                              <div class="form-group">
                                <label> Product Type </label>
                                <input type="text" name="prod_type" id="prod_type" class="form-control" placeholder="Enter Product Type">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputName1">Update the Product Type</label>
                                <select name="u_prodtype" id="u_prodtype">
                                  <option>&nbsp; Select Product Type</option>
                                  <?php
                                  foreach ($products as $product) {
                                  ?>
                                    <option value="<?= $product['prod_type']; ?>"> &nbsp; <?php echo $product['prod_type']; ?></option>

                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="p_image" id="p_image" class="file-upload-default" Required accept="image/png, image/jpeg">
                                <div class="input-group col-xs-12">
                                  <input type="text" class="form-control file-upload-info" name="p_image" id="p_image" disabled placeholder="Upload Image">
                                  <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                  </span>
                                </div>
                              </div>
                              <div class="form-group">
                                  <input type="hidden" name="old_image_name" id="old_image_name" class="form-control" value="<?php echo $product['image_name']; ?>">
                              </div>

                              <div class="form-group">
                                <label> Price </label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price">
                              </div>
                              <div class="form-group">
                                <label> In Stock </label>
                                <input type="text" name="stock" id="stock" class="form-control" placeholder="Enter Stock Count">
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="update" id="update" class="btn btn-primary">Update Data</button>
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
            $(this).find('td:nth-child(1)').html(index);
          });
        };
        addSerialNumber();
      </script>

      <script>
        $(document).ready(function() {
          $('.updatebtn').on('click', function() {

            $("#updatemodal").modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
              return $(this).text();
            }).get();

            console.log(data);

            $('#product_id').val(data[1]);
            $('#product').val(data[2]);
            $('#description').val(data[3]);
            $('#prod_type').val(data[4]);
            $('#p_image').val(data[5]);
            $('#price').val(data[6]);
            $('#stock').val(data[7]);

          });
        });

        // $(document).ready(function() {

        //   $("#update").click(function(e) {


        //     let n_product = $("#n_product").val();
        //     let product_id = $("#product_id").val();
        //     let n_description = $("#n_description").val();
        //     let u_prodtype = $("#u_prodtype").val();
        //     let n_image = $("#n_image").val();
        //     let n_price = $("#n_price").val();
        //     let n_stock = $("#n_stock").val();

        //     //  if(n_product =='' || n_description =='' u_prodtype =='' || n_image =='' n_price =='' || n_stock== ''  ) {
        //     //      alert("Please fill the field.");
        //     //      return false;
        //     //  }

        //     $.ajax({
        //       type: "POST",
        //       url: "../model/update_products.php",
        //       data: {
        //         n_product: n_product,
        //         product_id: product_id,
        //         n_description: n_description,
        //         u_prodtype: u_prodtype,
        //         n_image: n_image,
        //         n_price: n_price,
        //         n_stock: n_stock
        //       },
        //       cache: false,
        //       success: function(data) {

        //       },
        //       error: function(xhr, status, error) {
        //         console.error(xhr);
        //       }
        //     });


        //   });
        // });
      </script>
      </body>

      </html>
    <?php } ?>
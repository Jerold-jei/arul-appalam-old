<!DOCTYPE html>
<html lang="en">
<?php
//include_once '../../../Db connection.php';
//include_once '../../../adminchangepassword.php';
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <!-- <div class="brand-logo">
                <img src="../../images/logo.svg" alt="logo">
              </div> -->
              <h4>Welcome Admin!</h4>
              <h6 class="font-weight">Happy to see you again!</h6>
              <form action="../../../adminchangepassword.php" enctype="multipart/form-data" name="frmChange" onSubmit="return validatePassword()" class="forms-sample" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" name = "username" id="username" placeholder="Username" Required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Current Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="o_password" id="o_password" placeholder="Password" Required>                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">New Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="n_password" id="n_password" placeholder="Password" Required>                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Confirm Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="c_password" id="c_password" placeholder="Password" Required>                        
                  </div>
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                 <a href="#" class="auth-link text-black">Forgot password?</a>
                </div> -->
                <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                <div class="my-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" href="">UPDATE</button>
                </div>
                <!-- <div class="mb-2 d-flex">
                  <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                    <i class="mdi mdi-facebook mr-2"></i>Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>Google
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register-2.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
          <div class="col-lg-6 d-none d-lg-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end"></p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script>

$(document).ready(function() {
 
 $("#submit").click(function() {

     let username = $("#username").val();
     let o_password = $("#o_password").val();
     let n_password = $("#n_password").val();
     let c_password = $("#c_password").val();
     

     if(username ==''|| o_password ==''||n_password ==''||c_password =='') {
         alert("Please fill all fields.");
         return false;
     }

     $.ajax({
         type: "POST",
         url: "../../../adminchangepassword.php",
         data: {
          username: username,
          o_password: o_password,
          n_password: n_password,
          c_password:  c_password
          
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
  <!-- endinject -->
</body>

</html>

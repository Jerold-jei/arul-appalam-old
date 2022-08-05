
<?php
session_start();
require_once("../db/config.php");

if (isset($_SESSION['admin_name'])) {
    if (!empty($_SESSION['admin_name'])) {
        header("location: ../admin/dashboard.php");
    }
}
if (isset($_POST['login'])) {
    
    $username = $_POST['uname'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT admin_name, username, password FROM admin WHERE username = ? AND password = ? ");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    //$stmt->bind_result( $username, $password);
    $stmt->store_result();
    if ($stmt->num_rows > 0) 
    {
        $stmt->fetch();        
        $_SESSION['admin_name'] = $username;
        header("location:../admin/dashboard.php");

    } else {
        $_SESSION['invalid_details'] = "INVALID USERNAME/PASSWORD Combination!";
        header('location:login_form.php?error=INVALID USERNAME/PASSWORD');
    }
    $stmt->close();
}
?>

<?php
    session_start();
    include 'db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hasedPass = sha1($password);

        $sql = "SELECT id , email ,phone , name from users where email = '$email' and  password = '$hasedPass' and is_admin = 1 ";
        $result = mysqli_query($con , $sql);
        if(mysqli_num_rows($result) > 0){
            while($rows = mysqli_fetch_assoc($result)){
                $_SESSION['name'] = $rows['name'];
                $_SESSION['email'] = $rows['email'];
                $_SESSION['id'] = $rows['id'];
                $_SESSION['login'] = true;
                header('Location:dashboard.php');
                exit;
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

  
  <link rel="stylesheet" href="layout/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="layout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="layout/dist/css/adminlte.min.css">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <form class="login-form py-5" action="" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group mb-3">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" name="email" class="form-control" placeholder="Email" autofocus>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

        <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
      </div>
    </form>
        </div>
    </div>
    

  </div>


</body>

</html>
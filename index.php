<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "koneksi.php"


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Azia Responsive Bootstrap 4 Dashboard Template</title>

    <!-- vendor css -->
    <link href="template/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="template/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="template/lib/typicons.font/typicons.css" rel="stylesheet">
    <link rel="shortcut icon" href="template/img/favicon.png" />

    <!-- azia CSS -->
    <link rel="stylesheet" href="template/css/azia.css">

</head>

<body class="az-body">

    <div class="az-signin-wrapper">
        <div class="az-card-signin">
            <h1 class="az-logo">Beasiswa</h1>
            <div class="az-signin-header">
                <h2>Welcome back!</h2>
                <h4>Please sign in to continue</h4>

                <form action="" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter your email">
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div><!-- form-group -->
                    <button class="btn btn-az-primary btn-block" name="login">Sign In</button>
                </form>
                <?php
          if (isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $login = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'");
            
            $val = mysqli_num_rows($login);
            $b = $login->fetch_assoc();
            $_SESSION['name'] = $b['nama'];
      
            if($val = 1){
              // $data = mysqli_fetch_assoc($login);
              session_start();

              $_SESSION['id'] = $b['id'];
              $_SESSION['name'] = $b['nama'];
              $_SESSION['level'] = $b['level'];
              $_SESSION['email'] = $email;

              if($_SESSION['name'] != ""){
                  if($_SESSION['name'] != "admin"){
                    header("location:index2.php?page=session&sub=mahasiswa&nama=".$_SESSION['name']);  
                  } else{
                    header("location:index2.php");
                  }
              }else{
                header("location:index2.php");
              }
            }
          }
          ?>
            </div><!-- az-signin-headeor -->
            <div class="az-signin-footer">
                <p><a href="">Forgot password?</a></p>
                <p>Don't have an account? <a href="reg.php">Create an Account</a></p>
            </div><!-- az-signin-footer -->
        </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <script src="template/lib/jquery/jquery.min.js"></script>
    <script src="template/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="template/lib/ionicons/ionicons.js"></script>
    <script src="template/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="template/js/jquery.cookie.js" type="text/javascript"></script>

    <script src="template/js/azia.js"></script>
    <script>
    $(function() {
        'use strict'

    });
    </script>
</body>

</html>
<?php
session_start();
require('db/database.php');

if(isset($_POST['username']) && isset($_POST['password'])){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $stmt=$db->prepare("SELECT * FROM `login` INNER JOIN t_enseignant ON t_enseignant.id=login.ref_enseignant WHERE username= :username AND password= :password ");
    $stmt->execute([
        'username'=>$username,
        'password'=>$password,
    ]);
    $user=$stmt->fetch();

    if($user){
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_name']=$user['prenom'];
        $_SESSION['user_acces']=$user['fonction'];
        $_SESSION['user_photo']=$user['photo'];
        header('location:index.php');
    }
    else
    {
        header('location:login.php?error=1');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>PRESENCE SOFT</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="static/vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="static/vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="static/vendors/images/favicon-16x16.png">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="static/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="static/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="static/vendors/styles/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

    <style>
        body {
            background-image: url('static/img/login.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body class="login-page">
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="/vendors/images/forgot-password.png" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                <?php if(isset($_GET['error'])){echo "<div class='alert alert-danger text-white'>Erreur de la connexion verifier votre username et password svp !</div>";} ?>
                    <div class="login-title text-center">
                        <img class="img-circle" src="static/vendors/images/project-2.jpg" style="width: 150px;height: 150px;">
                    </div>
                    <h3 class="text-center text-primary">Autentification</h3>
                    <form method="post" action="">
                        <div class="input-group custom">
                            <input style="border-radius: 20px;" type="text" class="form-control form-control-sm" name="username" placeholder="Username">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" style="border-radius: 20px;" class="form-control form-control-sm" name="password" placeholder="**********">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <button style="border-radius: 20px;" class="btn btn-block btn-info btn-outline-*" type="submit">LogIn...</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- js -->
<script src="static/vendors/scripts/core.js"></script>
<script src="static/vendors/scripts/script.min.js"></script>
<script src="static/vendors/scripts/process.js"></script>
<script src="static/vendors/scripts/layout-settings.js"></script>
</body>
</html>

<?php

require_once '../../Models/User.php';
require_once '../../Controller/AuthController.php';
$err_Msg="";

if(isset($_GET["logout"]))
{
    session_start();
    session_destroy();
}

if(isset($_POST['email']) && isset($_POST['password']))
{
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $user = new User;
        $auth = new AuthController;
        $user->set_email( $_POST['email']);
        $user->setPassword($_POST['password']);
        if(!$auth->login($user))
        {

            if(!isset($_SESSION["userEmail"]))
            {
              session_start();  
            }
            $err_Msg=$_SESSION["err_Msg"];
        }
        else
        {
            if(!isset($_SESSION["userEmail"]))
            {
                session_start();
            }
            header("location: ../User/index.php");
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../imgs/youtube.png" rel="icon">
    <title>Youtube</title>
    <link href="../User/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../User/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../User/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" action="login.php" method="POST">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email ">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">

                                            </div>
                                        </div>
                                        <?php
                                    if($err_Msg !="")
                                    {
                                      ?>
                                        <div class="alert alert-danger" role="alert">
                                            <p><?php  echo $err_Msg;    ?></p>
                                        </div>


                                        <?php
                                    }
                                    ?>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Log in</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a href="register.php">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="../User/vendor/jquery/jquery.min.js"></script>
    <script src="../User/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../User/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../User/js/ruang-admin.min.js"></script>
</body>

</html>
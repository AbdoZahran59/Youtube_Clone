<?php

require_once '../../Models/User.php';
require_once '../../Controller/AuthController.php';

$err_Msg="";


if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']))
{
    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) )
    {
        $user = new User;
        $auth = new AuthController;
        $user->set_email( $_POST['email']);
        $user->setPassword($_POST['password']);
        $user->set_user_name($_POST['name']);
    
        if($auth->register($user))
        {    
           
            header("location: ../User/index.php");
        }
        else
        {
            $err_Msg=$_SESSION["err_Msg"];
        }
       
    }
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="../imgs/youtube.png" rel="icon">
    <title>Youtube</title>
    <link href="../User/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="../User/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../User/css/ruang-admin.min.css" rel="stylesheet" />
</head>

<body class="bg-gradient-login">
    <!-- Register Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form action="register.php" method="POST">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" type="text" class="form-control"
                                                id="exampleInputFirstName" placeholder="Enter Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email" />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" type="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password" />
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>



                                    </form>
                                    <hr />
                                    <div class="text-center">
                                        <a class="font-weight-bold small" href="login.php">Already have an account?</a>
                                    </div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Content -->
    <script src="../User/vendor/jquery/jquery.min.js"></script>
    <script src="../User/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../User/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../User/js/ruang-admin.min.js"></script>
</body>

</html>
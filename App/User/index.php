<?php

session_start();
if(!isset($_SESSION["userEmail"]))
{
    header("location: ../Auth/login.php");
}

require_once '../../Controller/videoController.php';
require_once '../../Models/Video.php';


$videoController = new videoController;
$videos = $videoController->getAllVideosIndex();

// echo $_SESSION['userEmail'];


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
    <link href="../User/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../User/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../User/assets/css/ruang-admin.min.css" rel="stylesheet">

    <!-- /////////////////// -->
    <link rel="shortcut icon" href="../assets2/images/fav.jpg">
    <link rel="stylesheet" href="../assets2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets2/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="../assets2/css/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets2/css/style.css" />
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html"
                style="background-color: #5a5959;">
                <div class="sidebar-brand-icon">
                    <!-- <img src="img/logo/logo2.png"> -->
                </div>
                <div class="sidebar-brand-text mx-3">YouTube</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">

                    <span>Home Page</span></a>
            </li>
            <hr class="sidebar-divider">






        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- TopBar -->
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top"
                    style="background: #919090;">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3" style="color: #cc1821;">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">


                            <form class="navbar-search" method="GET" action="index.php" style="margin-top:15px  ; ">
                                <div class="input-group">
                                    <input name="search" type="text" class="form-control bg-light border-1 small"
                                        placeholder="What do you want to look for?" aria-label="Search"
                                        aria-describedby="basic-addon2" style="border-color: #3f51b5;"
                                        value="<?php if(isset($_GET['search'])) {echo $_GET['search'];}  ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                                <span
                                    class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['userEmail'];    ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Auth/login.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Login
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Auth/login.php?logout">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>

                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->
                <!-- Topbar -->
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="padding-left: 5px;"></h1>

                    </div>

                    <div class="text-center">
                        <div class="container">
                            <div class="treanding-video container-fluid">
                                <div class="container">
                                    <div class="row video-title no-margin">
                                        <h6>
                                            <i class="fas fa-book"></i>
                                            Treanding Videos
                                        </h6>
                                    </div>
                                    <div class="video-row row">

                                        <?php
                                            foreach($videos as $video )
                                            {

                                        ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="video-card">
                                                <form action="video.php?<?php echo "id=". $video['V_ID'];?>"
                                                    method="GET">
                                                    <div>
                                                        <a href="video.php?<?php echo "id=". $video['V_ID'];?>">
                                                            <img src="<?php echo $video['thumbnail']   ?>"
                                                                style="width: 215.37px; height:147.52px;">

                                                            <div class="row details no-margin">
                                                                <h6><?php echo $video['title']   ?></h6>


                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6 col-6 no-padding left">

                                                        <span><?php echo $video['No_Of_Views']   ?>views</span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>


    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="../User/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../User/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../User/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../User/assets/js/ruang-admin.min.js"></script>

    <!-- /////////////////// -->

    <script src="../assets2/js/jquery-3.2.1.min.js"></script>
    <script src="../assets2/js/popper.min.js"></script>
    <script src="../assets2s/js/bootstrap.min.js"></script>
    <script src="../assets2/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="../assets2/js/script.js"></script>

</body>

</html>
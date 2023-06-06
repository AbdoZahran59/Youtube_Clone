<?php
require_once '../../Controller/videoController.php';
require_once '../../Models/Video.php';
$videoController = new videoController;
$err_Msg="";
session_start();
if(!isset($_SESSION["userEmail"]))
{
    header("location: ../Auth/login.php");
}



if(isset($_FILES['video']) && isset(($_POST['title'])))
{
    if( !empty($_FILES['video']) && !empty($_POST['title']) )
    {
        $video =new Video ;
        $video->title=$_POST['title'];
        
        $thumbnail_video=$_FILES['thumbnail']['name'];
        $temp_thumbnail=$_FILES['thumbnail']['tmp_name'];
        $folder_thumbnail="../imgs/".date("h-i-s").$thumbnail_video;

        $name_file = $_FILES['video']['name']; 
        $temp = $_FILES['video']['tmp_name'];
        $folder = "../Videos/".date("h-i-s"). $name_file;
    
         if (move_uploaded_file($temp,$folder) && move_uploaded_file($temp_thumbnail,$folder_thumbnail))
        {
        $video->name = $folder;
        $video->thumbnail=$folder_thumbnail;
        
        if ($videoController->addVideo($video,$_SESSION['userEmail'])) {
            header("location: profile.php");
        } else 
        {
            $errMsg = "Something went wrong... try again";
        }
        }   
        else 
         {
        $errMsg = "Error in Upload";
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
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/ruang-admin.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php"
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

            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top"
                style="background: #919090;">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3" style="color: #cc1821;">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">

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
                                class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['userEmail'];     ?></span>
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
                            <a class="dropdown-item" href="../Auth/register.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Create account
                            </a>

                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Topbar -->



            <!---Container Fluid-->

            <!-- Form Basic -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 style="font-size: larger;font-weight:bold;color: #bf3239;">Create Channel</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="upload.php" enctype="multipart/form-data">
                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Title of video</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div> -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title of video</label>
                            <input required name="title" type="text" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thumbnail of video</label>
                            <input required name="thumbnail" type="file" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Choose Video</label>
                            <input required name="video" type="file" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>

                        <button type="submit" class="btn btn-primary"
                            style="background-color:#cc1821; border-color:#cc1821;"><a href=""></a>Upload</button>

                    </form>
                </div>
            </div>





        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/ruang-admin.min.js"></script>

</body>

</html>
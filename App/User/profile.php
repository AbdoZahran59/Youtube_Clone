<?php

session_start();
if(!isset($_SESSION['userEmail']))
{
    header("location: ../Auth/login.php");
}

require_once "../../Controller/videoController.php";
require_once "../../Models/Video.php";


  ///Videos
$videoController=new videoController;
$videos = $videoController->getAllVideos($_SESSION['userEmail']);
$delete_Msg=false;


if(isset($_POST["delete"]))
{
    if(!empty($_POST["videoId"]))
    {
        if($videoController->deleteVideo($_POST["videoId"]))
        {
            $delete_Msg=true;
            $videos = $videoController->getAllVideos($_SESSION['userEmail']);
        }
    }
}
               //Channels
require_once "../../Controller/ChannelController.php";
$channelControl = new ChannelController ;
$channels = $channelControl->getAllchannels($_SESSION['userEmail']);

if(isset($_POST["deleteChannel"]))
{
    if(!empty($_POST["CH_ID"]))
    {
        if($channelControl->deleteChannel($_POST["CH_ID"]))
        {
            $delete_Msg=true;
            $channels = $channelControl->getAllchannels($_SESSION['userEmail']);
        }
    }
}


   ////Report
require_once __DIR__ . '/vendor/autoload.php';
if(isset($_POST['create']))
{
    $videoController=new videoController;


    $mpdf = new \Mpdf\Mpdf();
    
    $data = "";
    $data .= "Helle". " Your Name is : Ahmed";
    
    
    $mpdf->WriteHTML($data);
    
    $mpdf->Output('Report.pdf','D');  //D to Download , D just open inline


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
            <div id="content">
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
                                <a class="dropdown-item" href="../Auth/login.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>

                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="row">
                        <div class="col-lg-12 mb-4">

                            <div class="card">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                                    <a href="channel.php" class="btn btn-primary btn-icon-split"
                                        style="display: block;">
                                        <span class="text"> create channel </span>
                                    </a>



                                </div>
                                <div class="card-body">
                                    <a href="upload.php" class="btn btn-primary btn-icon-split">

                                        <span class="text">Upload Video</span>
                                    </a>
                                    <hr />
                                    <form method="POST" action="profile.php">


                                        <button name="create" type="submit" class="btn btn-primary"><a
                                                href=""></a>Create Pdf</button>

                                    </form>
                                </div>
                                <div>
                                    <h3>Your Videos</h3>
                                </div>
                                <?php
                                    if($videos ==null)
                                    {
                                        ?>
                                <div class="alert alert-danger" role="alert" style="margin-top:5px ;">
                                    No Avalibale Videos
                                </div>
                                <?php
                                    }
                                    else
                                    {

                                ?>
                                <div class="table-responsive">
                                    <!-- Simple Tables -->
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Video Id</th>
                                                <th>Video name</th>
                                                <th>Status</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                         foreach($videos as $video){
                                             ?>
                                            <tr>
                                                <td><?php echo $video["V_ID"]; ?></td>
                                                <td><?php echo $video["title"]; ?></td>

                                                <td><button disabled type="button" class="btn btn-success mb-1"
                                                        disabled>Success</button></td>
                                                <td>
                                                    <form action="profile.php" method="POST">
                                                        <button name="delete" type="submit"
                                                            class="btn btn-outline-danger mb-1"><i
                                                                class="fas fa-trash"></i></button>
                                                        <input type="hidden" name="videoId"
                                                            value="<?php echo $video["V_ID"];?>" />
                                                    </form>




                                                </td>
                                            </tr>

                                            <?php
                              }  
                              ?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php 
                                    } 
                                ?>
                                <div>
                                    <h3>Your Channels</h3>
                                </div>
                                <?php
                                    if($channels ==null)
                                    {
                                        ?>
                                <div class="alert alert-danger" role="alert" style="margin-top:5px ;">
                                    No Avalibale Channels
                                </div>
                                <?php
                                    }
                                    else
                                    {

                                ?>
                                <div class="table-responsive">
                                    <!-- Simple Tables -->
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Channel Id</th>
                                                <th>Channel Name</th>
                                                <th>Number Of Subscribe</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                         foreach($channels as $channel){
                                             ?>
                                            <tr>
                                                <td><?php echo $channel["CH_ID"]; ?></td>
                                                <td><?php echo $channel["Ch_Name"]; ?></td>

                                                <td><?php echo $channel["No Of Subs"]; ?></td>
                                                <td>
                                                    <form action="profile.php" method="POST">
                                                        <button name="deleteChannel" type="submit"
                                                            class="btn btn-outline-danger mb-1"><i
                                                                class="fas fa-trash"></i></button>
                                                        <input type="hidden" name="CH_ID"
                                                            value="<?php echo $channel["CH_ID"];?>" />
                                                    </form>




                                                </td>
                                            </tr>

                                            <?php
                              }  
                              ?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php 
                                    } 
                                ?>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Row-->

            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy; <script>
                            document.write(new Date().getFullYear());
                            </script> - developed by

                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
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
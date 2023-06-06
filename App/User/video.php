<?php
require_once '../../Models/Video.php';
require_once '../../Controller/videoController.php';
require_once '../../Controller/DBController.php';
require_once '../../Models/Video.php';
require_once '../../Models/comment.php';
require_once '../../Controller/LikeDislike.php';
require_once '../../Controller/CommentController.php';
session_start();
if(!isset($_SESSION["userEmail"]))
{
    header("location: ../Auth/login.php");
}

 $videoController = new videoController;

$id=$_GET['id'];
// echo $id;
// all about liks/dislikes 
$like = new LikeDislike;


if (isset($_POST['like'])) {
    $like->addlike($id);
}
if (isset($_POST['dislike'])) {
    $like->adddislike($id);

}

$db=DBController::getInstance();
$mysqli = $db->getConnection(); 

$query = "UPDATE videos SET No_Of_Views = (No_Of_Views+1) WHERE V_ID =$id";
            
$result = $mysqli->query($query);


$videoController = new videoController;
$videos = $videoController->getAllVideosIndex();

// all about comments 


$commentControl = new CommentController;
$rows = $commentControl->getAllComments($id);

if (isset($_POST['submitComment']) && !empty($_POST['Content'])) {
    $comment =new comment;
    $comment->set_message($_POST['Content']);
    $comment->set_V_ID($id);
    $comment->setEmail($_SESSION['userEmail']);
    $comment->set_message($_POST['Content']);
    echo $comment->get_message();

    echo $comment->getEmail();
    if ($commentControl->addComment($comment)) {
        header("location: video.php?id=$id");
    }
}


$path;
$Likes=0;
$Dislikes=0;
$title;
foreach ($videos as $video)
{
    if($video['V_ID'] == $_GET['id'])
    {
        $path=$video['name'];
        $Likes=$video['No_Of_Likes'];
        $Dislikes=$video['No_Of_Dislikes'];
        $title=$video['title'];
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: #5a5959;"
                href="index.php">
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
                                <a class="dropdown-item" href="../Auth/login.php">
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

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="padding-left: 5px;"></h1>

                    </div>

                    <div class="text-center">
                        <div class="container-fluid video-blog">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row no-margin video-cover">
                                            <iframe height="415" src="<?php  echo $path;    ?>" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>

                                            <!--  start like / dislike button -->
                                            <div>
                                                <form class="row no-margin video-title" bis_skin_checked="1"
                                                    method="POST" action="video.php?id=10">
                                                    <button name="like" type="submit"
                                                        class="btn btn-outline-danger mb-1">
                                                        <i class="fa fa-heart"></i> <?php echo $Likes ; ?></button>
                                                    <button name="dislike" type="submit"
                                                        class="btn btn-outline-danger mb-1"><i
                                                            class="fa fa-thumbs-down"></i>
                                                        <?php echo $Dislikes ; ?></button>
                                                    </from>
                                            </div>
                                            <!--  end like / dislike button -->

                                            <div class="row no-margin video-title" bis_skin_checked="1" style="margin-top: 70px;
                                                   margin-left: -140px;
                                                        margin-bottom: 2px;">
                                                <h6>Comments</h6>
                                            </div>


                                            <!--  comment section   (post comment )-->
                                            <div class="comment-text">
                                                <form class="form-row row" method="POST"
                                                    action="video.php?id='<?php echo $id?>" ?>
                                                    <!-- <input type='hidden' name="V_ID" value="<?php echo $id ?>">
                                                    <input type='hidden' name="Email"
                                                        value="<?php echo $_SESSION['userEmail']; ?>"> -->

                                                    <input name="Content" placeholder="Your Comment" rows="5"
                                                        class="form-control form-control-sm"></input>
                                                    <div class="form-row row">
                                                        <button name="submitComment" type="submit"
                                                            class="btn btn-danger">Post Comment</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="comment-container">


                                                <!--  comment section   (display all comments )-->
                                                <?php

                                            foreach ($rows as $row) {
                                            ?>
                                                <div class="comment-box row" style="background: #c1c1c1;
                                                            color: white;
                                                            margin-top: 5px;
                                                            width: 300px;">

                                                    <div class="col-10 detaila">
                                                        <p>
                                                            <?php echo $row['Content']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        ?>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row no-margin video-title">
                                            <h6 style="margin-left: 10px;">Other Videos</h6>
                                        </div>
                                        <?php   
                                        $i=0;
                                            foreach($videos as $video )
                                            {
                                               if($i==2){
                                                   break;
                                               }     
                                        ?>
                                        <div class="contri-bghy">
                                            <div class="image">
                                                <img src="<?php echo $video['thumbnail']."?id=". $video['V_ID']?>"
                                                    style="width: 300px; height:117.29;" alt="" />
                                            </div>
                                            <div class="detail">
                                                <h6><a
                                                        href="<?php echo "video.php?id=".$video['V_ID']  ?>"><?php echo $video['title'];    ?></a>
                                                </h6>

                                            </div>
                                        </div>
                                        <?php
                                           $i++; }
                                        ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!---Container Fluid-->
        </div>

    </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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
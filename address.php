<?php
session_start();
if (empty($_SESSION['user_id'])){
    header("Location: login/checkout");
}
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Prosenjit Enterprise | Shop Pen, Pencil, Paint.. </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
		<!-- font-awesome css -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- flexslider.css-->
        <link rel="stylesheet" href="css/flexslider.css">
		<!-- chosen.min.css-->
        <link rel="stylesheet" href="css/chosen.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="css/style.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="css/responsive.css">
		<!-- modernizr css -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="home-2 home-3">
            <!-- header-area-start -->
            <?php include("include/header.php") ?>

            <!-- header-area-end -->
            <!-- breadcrumbs-area-start -->
            <div class="breadcrumbs-area breadcrumb-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumbs-menu">
                                <ul class="breadcrumb-spl">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a class="active">Select Address</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumbs-area-end -->
            <!-- section-area-start -->
            <section class="add-back mb-70">
                <div class="mid-div">
                    <div class="mt-20">
                        <h4>Select Address</h4>
                        <div class="row">
                            <div class="col-md-9 add-row">
                                <h6>Vishal Nag</h6>
                                <h6>56/1, Greenwood Lane, By Lane 2, Lalganesh</h6>
                                <h6>Guwahati, Assam </h6>
                                <h6> 9436590120  imvishalnag@gmail.com</h6>
                            </div>
                            <div class="col-md-3 flex-spacearound-middle">
                                <a><button class="btn btn-success"> <i class="fa fa-check" aria-hidden="true"></i></button></a>
                                <a><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-md-9 add-row">
                                <h6>Vishal Nag</h6>
                                <h6>56/1, Greenwood Lane, By Lane 2, Lalganesh</h6>
                                <h6>Guwahati, Assam </h6>
                                <h6> 9436590120  imvishalnag@gmail.com</h6>
                            </div>
                            <div class="col-md-3 flex-spacearound-middle">
                                <a><button class="btn btn-success"> <i class="fa fa-check" aria-hidden="true"></i></button></a>
                                <a><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                            </div>
                        </div><hr>
                                                <div class="row">
                            <div class="col-md-9 add-row">
                                <h6>Vishal Nag</h6>
                                <h6>56/1, Greenwood Lane, By Lane 2, Lalganesh</h6>
                                <h6>Guwahati, Assam </h6>
                                <h6> 9436590120  imvishalnag@gmail.com</h6>
                            </div>
                            <div class="col-md-3 flex-spacearound-middle">
                                <a><button class="btn btn-success"> <i class="fa fa-check" aria-hidden="true"></i></button></a>
                                <a><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                            </div>
                        </div><hr>
                        <div class="row flex-center">
                            <a href="new-address.php"><button type="button" class="btn btn-info">Add New Address</button></a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section-area-end -->

            <!-- footer-area-start -->
             <?php include("include/footer.php") ?>
            <!-- footer-area-end -->
            
		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
		<!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
		<!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
		<!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
		<!-- wow js -->
        <script src="js/wow.min.js"></script>
		<!-- jquery.parallax-1.1.3.js -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
		<!-- jquery.countdown.min.js -->
        <script src="js/jquery.countdown.min.js"></script>
		<!-- jquery.flexslider.js -->
        <script src="js/jquery.flexslider.js"></script>
		<!-- chosen.jquery.min.js -->
        <script src="js/chosen.jquery.min.js"></script>
		<!-- jquery.counterup.min.js -->
        <script src="js/jquery.counterup.min.js"></script>
		<!-- waypoints.min.js -->
        <script src="js/waypoints.min.js"></script>
		<!-- plugins js -->
        <script src="js/plugins.js"></script>
		<!-- main js -->
        <script src="js/main.js"></script>
    </body>
</html>

<!doctype html>
<html class="no-js" lang="en">
<head>
        <base href="http://localhost/stationary/" />
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Prosenjit Enterprise | Shop Pen, Pencil, Paint..</title>
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
			<div class="breadcrumbs-area mb-70">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="breadcrumbs-menu">
								<ul>
									<li><a href="#">Home</a></li>
									<li><a href="#" class="active">Login</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->

            <!-- slider-area-start -->

            <div class="user-login-area mb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-title text-center mb-30">
                                <h2>Sign Up</h2>
                                <?php
                                if (isset($_GET['msg'])) {
                                    $msg = $_GET['msg'];
                                    if ($msg == 2) {
                                        print '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Email or mobile number already registered.
          </div>';
                                    }
                                    if ($msg == 3) {
                                        print '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Password mismatch.
          </div>';
                                    }
                                    if ($msg == 4) {
                                        print '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Please enter valid referal mobile number.
          </div>';
                                    }

                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                            <div class="billing-fields">
                                <form action="php/user/register.php" method="Post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Name*</label>
                                            <input type="text" class="form-control" name="name"  data-validation="required" data-validation-length="min4">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Email*</label>
                                            <input type="email" class="form-control" name="user_email" id="inputEmail4" data-validation="email required">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Phone Number*</label>
                                            <input type="text" name="user_mobile" class="form-control" id="inputPassword4" data-validation="length number" data-validation="required"  data-validation-length="max10">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Password*</label>
                                            <input type="password" name="user_password" class="form-control" data-validation="strength required" data-validation-strength="1">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Confirm Password*</label>
                                            <input type="password" name="user_confirm_password" class="form-control" id="inputPassword4" data-validation="confirmation" data-validation-confirm="user_password">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Refered Phone Number</label>
                                            <input type="text" name="ref_mobile" class="form-control" id="inputPassword4">
                                        </div>
                                    </div>

                                    <center>
                                        <button type="submit" name="submit" class="btn btn-primary">Register</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- social-group-area-end -->
            <!-- footer-area-start -->
             <?php include("include/footer.php") ?>
            <!-- footer-area-end -->


		
		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
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
    <script>
        $.validate();
    </script>
            <script>
                $.validate({
                    modules : 'security',
                    onModulesLoaded : function() {
                        var optionalConfig = {
                            fontSize: '12pt',
                            padding: '4px',
                            bad : 'Very bad',
                            weak : 'Weak',
                            good : 'Good',
                            strong : 'Strong'
                        };

                        $('input[name="pass"]').displayPasswordStrength(optionalConfig);
                    }

                });
            </script>
    </body>
</html>

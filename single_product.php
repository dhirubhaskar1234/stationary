<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/koparion-v1/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Oct 2018 12:15:41 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Koparion – Book Shop Bootstrap 4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <base href="http://localhost/stationary/" />
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
    <body class="product-details home-2 home-3">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- header-area-start -->
        <?php include("include/header.php") ?>
		<!-- header-area-end -->
		<!-- breadcrumbs-area-start -->
<!--		<div class="breadcrumbs-area mb-70 breadcrumb-banner">-->
<!--			<div class="container">-->
<!--				<div class="row">-->
<!--					<div class="col-lg-12">-->
<!--						<div class="breadcrumbs-menu">-->
<!--							<ul class="breadcrumb-spl">-->
<!--								<li><a href="index.php">Home</a></li>-->
<!--								<li><a href="index.php">Stationery</a></li>-->
<!--								<li><a class="active">Correction Pen</a></li>-->
<!--							</ul>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
		<!-- breadcrumbs-area-end -->
		<!-- product-main-area-start -->
		<div class="product-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="shop-left">
							<div class="left-title mb-20">
								<div class="left-title-2 mt-20">
									<h2>Offer Zone</h2>
								</div>
							</div>
							<div class="left-menu mb-30">
								<ul>
                                    <?php
                                    $sql_cat="SELECT * FROM `categories` WHERE `parrent_id`=1";
                                    if ($result_cat=mysqli_query($connection,$sql_cat)){
                                        while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                            $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                            ?>
                                            <li><a href="categories/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a></li>

                                        <?php } } ?>
								</ul>
							</div>
							<div class="left-title-2 mb-30">
								<h2>Offer Zone</h2>
							</div>
							<div class="banner-area mb-30">
								<div class="banner-img-2">
									<a href="#"><img src="img/banner/offer-banner.jpg" alt="banner" /></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<!-- product-main-area-start -->
                        <?php
                        if (isset($_GET['id'],$_GET['name'])) {
                            $id = clean($_GET['id']);
                            $name = clean($_GET['name']);
                            $sql_product = "SELECT * FROM `products` WHERE `id`='$id' AND `active`=1";
                            if ($result_product = mysqli_query($connection, $sql_product)) {
                                $count = mysqli_num_rows($result_product);
                                if ($count > 0) {
                                    $row_product = mysqli_fetch_assoc($result_product);
                                    $url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_product['product_name'])));
                                    $sql_min_price = "SELECT * FROM `stock` WHERE `product_id`='$row_product[id]' AND `main_price` IN (SELECT MIN(`main_price`) FROM `stock` WHERE `product_id`='$row_product[id]')";
                                    //echo $sql_min_price;
                                    if ($result_min_price = mysqli_query($connection, $sql_min_price)) {
                                        $row_min_price = mysqli_fetch_assoc($result_min_price);
                                        $sql_price = "SELECT * FROM `stock` WHERE `id`='$row_min_price[id]'";
                                        //echo $sql_price;
                                        if ($result_price = mysqli_query($connection, $sql_price)) {
                                            $row_price = mysqli_fetch_assoc($result_price);

                                        }
                                    }
                                }
                            }
                        }




                        ?>



                        <div class="product-main-area">
							<div class="row">
								<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
									<div class="product-info-main">
										<div class="page-title">
											<h1 style="font-family: serif"><?php echo $row_product['product_name'] ?></h1>
										</div>
										<div class="product-info-stock-sku">
											<span>stock</span>
											<div class="product-attribute">
												<span id="availabel" style="color: green;"></span>
                                                <span id="unavailable" style="color:red;"></span>


											</div>
                                            <span style="font-family: serif">Minimum order quantity: <?php echo $row_product['min_order'] ?></span>
										</div>
										<form method="post" action="php/cart/add_to_cart.php">
											<div class="product-reviews-summary" style="display: flex;">
												<div class="dropdown">
                                                    <select id="size" name="size">
                                                        <option>Select Size</option>
                                                    <?php
                                                        $sql_size="SELECT `stock`.`id` as s_id,`stock`.`product_id` as s_p_id,`stock`.`size_id` as si_id,`stock`.`stock` as s_stock,`stock`.`price` as s_price,`stock`.`discount_price` as s_dis,`stock`.`main_price` as s_main_price, `size`.`name` as s_name FROM `stock` INNER JOIN `size` ON `stock`.`size_id`=`size`.`id` WHERE `stock`.`product_id`=$id";
                                                        if ($result_size=mysqli_query($connection,$sql_size)){
                                                            while ($row_size=mysqli_fetch_assoc($result_size)){



                                                    ?>

														<option value="<?php echo $row_size['s_id']; ?>"><?php  echo $row_size['s_name']; ?></option>

                                                        <?php } } ?>
													</select>
												</div>
												<div class="product-info-price" style="margin: 0">
													<div class="price-final">
														<span id="ajax_new_price" style="font-family: serif"> Rs. <?php echo $row_price['main_price']; ?></span>&nbsp;
                                                        <?php
                                                            if ($row_price['discount_price'] > 0){
                                                        ?>
														<span class="old-price" style="font-family: serif" id="ajax_old_price"> Rs. <?php echo $row_price['price']; ?></span>
                                                        <?php }
                                                        else {
                                                             ?>
                                                            <span class="old-price" id="ajax_old_price" style="font-family: serif"></span>
                                                        <?php
                                                        }
                                                        ?>
													</div>
												</div>											
											</div>
											<div class="product-add-form">
                                                      <input type="hidden" name="quan" value="<?php echo $row_product['min_order'];?>">
												     <input type="hidden" name="p_id" value="<?php echo $row_product['id']; ?>">
                                                    <a><button id="cart_button" type="submit" name="submit" style="    border: none;background: transparent;">Add to cart</button></a>
												</form>
											</div>

<!--										<div class="product-social-links">-->
<!--											<div class="product-addto-links-text">-->
<!--												<p>Powerwalking to the gym or strolling to the local coffeehouse, the Savvy Shoulder Tote lets you stash your essentials in sporty style! A top-loading compartment provides quick and easy access to larger items, while zippered pockets on the front and side hold cash, credit cards and phone.</p>-->
<!--											</div>-->
<!--										</div>-->
									</div>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
									<div class="flexslider">
										<ul class="slides">
											<li data-thumb="backend/stationary/uploads/<?php echo $row_product['image']; ?>">
											  <img src="backend/stationary/uploads/<?php echo $row_product['image']; ?>" alt="woman" />
											</li>
                                            <?php
                                                $sql_image="SELECT * FROM `images` WHERE `product_id`=$id LIMIT 2,3";
                                                if ($result_image=mysqli_query($connection,$sql_image)){
                                                    $count=mysqli_num_rows($result_image);
                                                    if ($count > 0){
                                                        while ($row_image=mysqli_fetch_assoc($result_image)){


                                            ?>
											<li data-thumb="backend/stationary/uploads/<?php echo $row_image['name']; ?>">
											  <img src="backend/stationary/uploads/<?php echo $row_image['name']; ?>" alt="woman" />
											</li>
											<?php } } }?>
										</ul>
									</div>
								</div>
							</div>	
						</div>
						<!-- product-main-area-end -->
						<!-- product-info-area-start -->
						<div class="product-info-area mt-20">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li class="active"><a href="#Details" data-toggle="tab">Details</a></li>
							</ul>
							<div class="tab-content">
                                <div class="tab-pane active" id="Details">
                                    <div class="valu">
                                      <?php echo $row_product['product_description']; ?>
                                    </div>
                                </div>
                            </div>	
						</div>
						<!-- product-info-area-end -->
					</div>
				</div>
		        <!-- similar-product-area-start -->
            <?php
                $sql_rel="SELECT * FROM `products` WHERE `main_cat`='$row_product[main_cat]'";
                if ($result_rel=mysqli_query($connection,$sql_rel)){
                    $count_rel=mysqli_num_rows($result_rel);
                    if($count_rel > 0){





            ?>
				<div class="new-book-area">
					<div class="section-title text-center mb-30">
						<h3>Products You May Like</h3>
					</div>
                    <div class="tab-active-3 owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-1736px, 0px, 0px); transition: all 1s ease 0s; width: 2821px;">

                                <div class="owl-item" style="width: 197px; margin-right: 20px;">
                                    <div class="tab-total">
                                        <!-- single-product-start -->
                                        <div class=" mb-40">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="img/product/new/45.jpg" alt="book" class="primary">
                                                </a>
                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-details text-center">

                                                <h4><a href="#">Apsara pen</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        <li>$52.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-link">
                                                <div class="product-button quick-view">
                                                    <a class="action-view" href="single_product.php" title="Quick View">
                                                        Quick View
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-end -->
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 197px; margin-right: 20px;">
                                    <div class="tab-total">
                                        <!-- single-product-start -->
                                        <div class=" mb-40">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="img/product/new/3.jpg" alt="book" class="primary">
                                                </a>
                                                <div class="quick-view">
                                                    <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-details text-center">

                                                <h4><a href="#">Apsara pen</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        <li>$52.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-link">
                                                <div class="product-button">
                                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                <div class="add-to-link">
                                                    <ul>
                                                        <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-end -->
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 197px; margin-right: 20px;">
                                    <div class="tab-total">
                                        <!-- single-product-start -->
                                        <div class=" mb-40">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="img/product/new/18.jpg" alt="book" class="primary">
                                                </a>
                                                <div class="quick-view">
                                                    <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-details text-center">

                                                <h4><a href="#">Apsara pen</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        <li>$52.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-link">
                                                <div class="product-button">
                                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                <div class="add-to-link">
                                                    <ul>
                                                        <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-end -->
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 197px; margin-right: 20px;">
                                    <div class="tab-total">
                                        <!-- single-product-start -->
                                        <div class=" mb-40">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="img/product/new/35.jpg" alt="book" class="primary">
                                                </a>
                                                <div class="quick-view">
                                                    <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-details text-center">

                                                <h4><a href="#">Apsara pen</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        <li>$52.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-link">
                                                <div class="product-button">
                                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                <div class="add-to-link">
                                                    <ul>
                                                        <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-end -->
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 197px; margin-right: 20px;">
                                    <div class="tab-total">
                                        <!-- single-product-start -->
                                        <div class=" mb-40">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="img/product/new/15.jpg" alt="book" class="primary">
                                                </a>
                                                <div class="quick-view">
                                                    <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-details text-center">

                                                <h4><a href="#">Apsara pen</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        <li>$52.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-link">
                                                <div class="product-button">
                                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                <div class="add-to-link">
                                                    <ul>
                                                        <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-end -->
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 197px; margin-right: 20px;">
                                    <div class="tab-total">
                                        <!-- single-product-start -->
                                        <div class=" mb-40">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="img/product/new/23.jpg" alt="book" class="primary">
                                                </a>
                                                <div class="quick-view">
                                                    <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-details text-center">

                                                <h4><a href="#">Apsara pen</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        <li>$52.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-link">
                                                <div class="product-button">
                                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                <div class="add-to-link">
                                                    <ul>
                                                        <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left"></i></button>
                            <button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>






                    <?php } }  ?>
		            <!-- similar-product-area-end -->
					<div class="section-title text-center mt-30">
						<a href="product.php"><button class="btn btn-primary"> View All Product</button></a>
					</div>
				</div>
				<!-- new-book-area-start -->
			</div>
		</div>
		<!-- product-main-area-end -->
		<section class="mb-70">
			<div class="container">
				<img src="img/banner/1001.jpg" class="single-pro-img">				
			</div>
		</section>
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
    <script>
        $(document).ready(function () {
            $('#cart_button').prop('disabled', true);
            $('#size').change(function () {
               var size_val= $('#size').val();

                $.ajax({
                    url:'php/ajax/size.php',
                    method:'POST',
                    data : { foo : size_val},
                    // dataType:'text',
                    success:function(data){

                        var obj = JSON.parse(data);
                        $('#ajax_new_price').text("Rs "+obj.main_price);

                        if (obj.discount_price != 0)
                            $('#ajax_old_price').text("Rs "+obj.price);
                        else
                            $('#ajax_old_price').text("");

                        $('#child_sub_cat').html(data);
                        if (obj.stock > 0){
                            $('#availabel').text("available");
                            $('#cart_button').prop('disabled', false);

                        }else{
                            $('#unavailable').text("out of stock");
                            $('#cart_button').prop('disabled', true);
                        }
                    }
                });
            });
        });
    </script>
    </body>

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/koparion-v1/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Oct 2018 12:15:43 GMT -->
</html>

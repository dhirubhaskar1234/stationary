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
        <style type="text/css">.thumbnail{margin-bottom: 0}.media-body{padding: 12px 12px 34px}.Quanty{display: flex}.product-add-form a{padding:0 15px;border-radius: 15px}.border-right{border-right:1px solid #333;}.totalbox{background: #efeded;padding: 20px;}.media{border-bottom: 1px solid #a7a7a7;padding: 6px} </style>
    </head>
    <body class="home-2 home-3">
            <!-- header-area-start -->
            <?php include("include/header.php") ?>
            <!-- header-area-end -->

            <!-- cart-area-start -->
            <div class="category-image mb-30">
                <img src="img/banner/cart.jpg" alt="banner">
            </div>
            <?php

            if(!empty($_SESSION['cart'])&&(empty($_SESSION['user_id']))){
                $count_ses=count($_SESSION['cart']);
                if ($count_ses > 0){





            ?>

            <section>
                <div class="section-title text-center mb-18 container">
                    <h2>Your Cart</h2>
                    <p>You have selected products.<br> Its time to buy.</p>
                </div>
            </section>

            <section style="padding: 20px 0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 mb-30">
                            <?php
                            $main_total=null;
                            foreach ($_SESSION['cart'] as $product => $value) {
                                $size= $value['size_id'];
                                $quan=$value['quantity'];
                                $p_id=$product;
                                $sql="SELECT `products`.`id` as p_id,`products`.`product_name` as p_name,`products`.`image` as p_image,`products`.`min_order` as p_min_order,`products`.`gst`as p_gst, `stock`.`stock` as s_stock,`stock`.`main_price` as s_price,`size`.`name` as s_name FROM `products` INNER JOIN `stock` ON `products`.`id`=`stock`.`product_id` INNER JOIN `size` ON `stock`.`size_id`=`size`.`id` WHERE `products`.`id`=$p_id AND `stock`.`id`=$size";
                                if ($result=mysqli_query($connection,$sql)){
                                    while ($row=mysqli_fetch_assoc($result)){
                                        $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['p_name'])));
                                        ?>
                            <div class="media">
                                <div>
                                    <a class="thumbnail pull-left" href="details/<?php echo $row['p_id']; ?>/<?php echo $url; ?>"> <img class="media-object" src="backend/stationary/uploads/<?php echo $row['p_image']; ?>" alt="#"></a>
                                    <div class="media-body">
                                       <h4 class="media-heading"><a href="details/<?php echo $row['p_id']; ?>/<?php echo $url; ?>""><?php echo $row['p_name']; ?></a></h4>
                                        <p class="price_table">Size name: <span> <?php echo $row['s_name']; ?></span></p>
                                        <p class="price_table"> Quantity: <span> <?php echo $quan; ?></span></p>
                                       <p class="price_table"> Rate: <span>₹ <?php echo $row['s_price']; ?></span></p>

                                        <p class="price_table"> GST:<span><?php echo $row['p_gst']; ?>%</span></p>
                                        <?php
                                                $gst=$row['s_price']*$row['p_gst']/100;
                                                $product_price=$row['s_price']+$gst;
                                                $total=$product_price*$quan;
                                                $main_total=$main_total+$total;

                                        ?>
                                        <p class="price_table"> Total:<span>₹ <?php echo $total; ?></span></p>
                                    </div>                                    
                                </div><br>
                                <form action="php/cart/update_ses_cart.php" method="post">
                                <div class="Quanty">
                                    <input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">

                                    <button type="submit" name="remove" class="btn btn-danger"><i class="fa fa-trash"></i></button>&nbsp;
                                    <input class="form-control" min="<?php echo $row['p_min_order']; ?>" value="<?php echo $quan; ?>" name="quan" type="number">&nbsp;
                                    <button type="submit" name="update" class="btn btn-success"><i class="fa fa-refresh"></i></button>
                                </div>
                                </form>
                            </div>
                            <?php } } } ?>

                        </div>
                        <div class="col-sm-4 totalbox">
                            <div>
                                <h4 class="text-center">Cart Total</h4><hr>

                                <h5>Grandtotal: <span>₹ <?php echo $main_total; ?></span></h5>
                            </div>
                            <div class="product-add-form">
                                <a href="home" style="margin-right: 5px">Continue Shopping</a>
                                <a href="address">Checkout</a>
                            </div>
                                                      
                        </div>
                    </div>
                </div>
            </section>
            <?php } }elseif(empty($_SESSION['cart']) && (!empty($_SESSION['user_id']))){
                $sql="SELECT `cart`.`id` as c_id,`cart`.`product_id` as c_p_id,`cart`.`size_id` as c_size_id,`cart`.`user_id` as c_user_id,`cart`.`product_quan` as c_product_quan,`size`.`name` as s_name,`stock`.`id` as s_id,`stock`.`product_id` as s_p_id,`stock`.`price` as s_price,`stock`.`main_price` as s_main_price ,`products`.`product_name` as p_name,`products`.`image` as p_image, `products`.`min_order` as p_min_order,`products`.`gst` as p_gst FROM `cart` INNER JOIN `products` ON `cart`.`product_id`=`products`.`id` INNER JOIN `stock` ON `stock`.`id`=`cart`.`size_id` INNER JOIN
                `size` ON `size`.`id`=`stock`.`size_id` WHERE `cart`.`user_id`='$_SESSION[user_id]'";
                if ($result=mysqli_query($connection,$sql)){
                    $count=mysqli_num_rows($result);
                    if ($count > 0){
                        ?>
                        <section>
                            <div class="section-title text-center mb-18 container">
                                <h2>Your Cart</h2>
                                <p>You have selected products.<br> Its time to buy.</p>
                            </div>
                        </section>

                        <section style="padding: 20px 0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-8 mb-30">
                                        <?php
                                            $main_total=null;
                                            while ($row=mysqli_fetch_assoc($result)){
                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['p_name'])));
                                        ?>
                                                    <div class="media">
                                                        <div>
                                                            <a class="thumbnail pull-left" href="details/<?php echo $row['c_p_id']; ?>/<?php echo $url; ?>"> <img class="media-object" src="backend/stationary/uploads/<?php echo $row['p_image']; ?>" alt="#"></a>
                                                            <div class="media-body">
                                                                <h4 class="media-heading"><a href="details/<?php echo $row['c_p_id']; ?>/<?php echo $url; ?>""><?php echo $row['p_name']; ?></a></h4>
                                                                <p class="price_table">Size name: <span> <?php echo $row['s_name']; ?></span></p>
                                                                <p class="price_table"> Quantity: <span> <?php echo $row['c_product_quan']; ?></span></p>
                                                                <p class="price_table"> Rate: <span>₹ <?php echo $row['s_main_price']; ?></span></p>

                                                                <p class="price_table"> GST:<span><?php echo $row['p_gst']; ?>%</span></p>
                                                                <?php
                                                                $gst=$row['s_main_price']*$row['p_gst']/100;
                                                                $product_price=$row['s_main_price']+$gst;
                                                                $total=$product_price*$row['c_product_quan'];
                                                                $main_total=$main_total+$total;

                                                                ?>
                                                                <p class="price_table"> Total:<span>₹ <?php echo $total; ?></span></p>
                                                            </div>
                                                        </div><br>
                                                        <form action="php/cart/update_cart.php" method="post">
                                                            <div class="Quanty">
                                                                <input type="hidden" name="c_id" value="<?php echo $row['c_id']; ?>">

                                                                <button type="submit" name="remove" class="btn btn-danger"><i class="fa fa-trash"></i></button>&nbsp;
                                                                <input class="form-control" min="<?php echo $row['p_min_order']; ?>" value="<?php echo $row['c_product_quan']; ?>" name="quan" type="number">&nbsp;
                                                                <button type="submit" name="update" class="btn btn-success"><i class="fa fa-refresh"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php }  ?>

                                    </div>
                                    <div class="col-sm-4 totalbox">
                                        <div>
                                            <h4 class="text-center">Cart Total</h4><hr>

                                            <h5>Grandtotal: <span>₹ <?php echo $main_total; ?></span></h5>
                                        </div>
                                        <div class="product-add-form">
                                            <a href="home" style="margin-right: 5px">Continue Shopping</a>
                                            <a href="address">Checkout</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>





                        <?php
                    }
                }
                ?>

           <?php } ?>
            <!-- cart-area-end -->
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

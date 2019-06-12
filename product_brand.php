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
<body class="shop home-2 home-3">
<!-- header-area-start -->
<?php include("include/header.php") ?>
<!-- header-area-end -->
<!-- shop-main-area-start -->
<div class="shop-main-area mb-70">
    <div class="category-image mb-30">
        <img src="img/banner/39.jpg" alt="banner" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mobile-sidebar-none">
                <?php include("include/product-sidebar.php") ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <?php
                if (isset($_GET['brand'])){
                    $brand_id=clean($_GET['brand']);
                    $sql_brand="SELECT * FROM `brand` WHERE `id`=$brand_id";

                    if ($result_brand=mysqli_query($connection,$sql_brand)){
                        $row_brand=mysqli_fetch_assoc($result_brand);
                        $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_brand['name'])));
                    }
                }
                if (isset($_GET['page'])) {


                    $page=clean($_GET['page']);

                }else{

                    $page=1;
                }

                if($page=='' || $page==1){

                    $page_1=0;
                }else{

                    $page_1=($page * 16)-16;


                }
                ?>
                <div class="section-title-5 mb-30">
                    <?php if (isset($row_brand['name'])){ ?>
                        <h2><?php echo $row_brand['name']; ?></h2>
                    <?php } ?>
                </div><hr>
                <!-- tab-area-start -->
                <div class="tab-content">
                    <div class="tab-pane active" id="th">
                        <div class="row">
                            <?php
                            $sql_product="SELECT * FROM `products` WHERE `brand`='$brand_id' AND `active`=1 LIMIT $page_1,16";
                            if ($result_product=mysqli_query($connection,$sql_product)){
                                $count=mysqli_num_rows($result_product);
                                if ($count > 0){
                                    while ($row_product=mysqli_fetch_assoc($result_product)){
                                        $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_product['product_name'])));
                                        $sql_min_price="SELECT * FROM `stock` WHERE `product_id`='$row_product[id]' AND `main_price` IN (SELECT MIN(`main_price`) FROM `stock` WHERE `product_id`='$row_product[id]')";
                                        //echo $sql_min_price;
                                        if($result_min_price=mysqli_query($connection,$sql_min_price)) {
                                            $row_min_price = mysqli_fetch_assoc($result_min_price);
                                            $sql_price="SELECT * FROM `stock` WHERE `id`='$row_min_price[id]'";
                                            //echo $sql_price;
                                            if($result_price=mysqli_query($connection,$sql_price)){
                                                while($row_price=mysqli_fetch_assoc($result_price)){


                                                    ?>
                                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                                        <!-- single-product-start -->
                                                        <div class="product-wrapper mb-40">
                                                            <div class="product-img">
                                                                <a href="details/<?php echo $row_product['id']; ?>/<?php echo $url; ?>"
                                                                >
                                                                    <img src="backend/stationary/uploads/<?php echo $row_product['image']; ?>"
                                                                         alt="<?php echo $row_brand['name']; ?>" class="primary"/>
                                                                </a>


                                                            </div>
                                                            <div class="product-details text-center">

                                                                <h4><a href="details/<?php echo $row_product['id']; ?>/<?php echo $url; ?>"><?php echo $row_product['product_name']; ?></a></h4>
                                                                <div class="product-price">
                                                                    <ul>
                                                                        <li>Rs <?php echo $row_price['main_price']; ?></li>
                                                                        <?php
                                                                        if ($row_price['discount_price'] > 0){
                                                                            ?>
                                                                            <li class="old-price">Rs <?php echo $row_price['price']; ?></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- single-product-end -->
                                                    </div>
                                                    <?php
                                                }
                                            }

                                        }
                                    }
                                }else{
                                    print '<h3 style="text-align: center;">Sorry no product found</h3>';
                                }

                            }

                            ?>

                        </div>
                    </div>
                </div>
                <!-- tab-area-end -->
                <!-- pagination-area-start -->
                <?php
                if($count > 0){
                    $sql_pag="SELECT * FROM `products` WHERE `brand`='$brand_id' AND `active`=1";
                    if ($result_pag=mysqli_query($connection,$sql_pag)){
                        $count_pag=mysqli_num_rows($result_pag);
                        $count_page=ceil($count_pag/16);
                    }
                    ?>
                    <div class="pagination-area mt-50">
                        <div class="list-page-2">
                            <p><?php echo $count_pag; ?> items </p>
                        </div>
                        <div class="page-number">
                            <ul>
                                <?php
                                for ($i=1; $i <= $count_page; $i++) {

                                    if ($page == $i) {
                                        print ' <li class="active "><a class="page-link" href="brand/'.$brand_id.'/'.$url.'/' . $i . '">' . $i . '</a></li>';
                                    } else {
                                        print ' <li><a class="page-link" href="brand/'.$brand_id.'/'.$url.'/' . $i . '">' . $i . '</a></li>';

                                    }
                                }


                                ?>


                            </ul>
                        </div>
                    </div>
                <?php } ?>
                <!-- pagination-area-end -->
            </div>
        </div>
    </div>
</div>
<!-- shop-main-area-end -->
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

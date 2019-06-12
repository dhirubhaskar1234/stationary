<?php
    if (session_status()==PHP_SESSION_NONE) {
        session_start();
    }
    include ("backend/stationary/include/db.php");
    function mysql_entities_fix_string($string){
        return htmlentities(mysql_fix_string($string));
    }
    function mysql_fix_string($string){
        if (get_magic_quotes_gpc())
            $string = stripslashes($string);
        return $string;
    }
    function clean($variable)
    {
        global $connection;
        $variable = mysqli_real_escape_string($connection,mysql_entities_fix_string($variable));
        return $variable;
    }
?>

            <header>
                <!-- header-top-area-start -->
                <div class="header-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="language-area">
                                    <h5>Welcome to Prosenjit Enterprise !!</h5>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="account-area text-right">
                                    <ul>
                                        <?php
                                        if (isset($_SESSION['user_id'])) {


                                            ?>
                                            <li><a href="php/user/logout.php">Log Out</a></li>

                                            <li><a href="order-history.php"><?php echo $_SESSION['user_name']; ?></a></li>
                                            <?php
                                        }else{
                                        ?>
                                        <li><a href="register">Sign up</a></li>
                                        <li><a href="login">Sign in</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-top-area-end -->
                <!-- header-mid-area-start -->
                <div class="header-mid-area ptb-10">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="logo-area logo-xs-mrg-bottom">
                                    <a href="home"><img style="border-radius: 15px;" src="img/logo/new.jpg" alt="logo" /></a>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 hidden-sm hidden-xs v-center">
                                <div class="main-menu hidden-sm hidden-xs">
                                    <nav>
                                        <ul>
                                            <center>
                                                <li class="active"><a href="home">Home</i></a></li>
                                                <li><a>Shop By Brand<i class="fa fa-angle-down"></i></a>
                                                    <div class="sub-menu sub-menu-2 sub-menu-3" style="display: flex; border-radius: 10px">
                                                        <ul>
                                                            <?php
                                                                $sql_brand="SELECT * FROM `brand` LIMIT 7";
                                                                if ($result_brand=mysqli_query($connection,$sql_brand)){
                                                                    while($row_brand=mysqli_fetch_assoc($result_brand)){
                                                                        $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_brand['name'])));
                                                            ?>

                                                            <li><a href="brand/<?php echo $row_brand['id']; ?>/<?php echo $url; ?>"><?php echo $row_brand['name']; ?></a></li>

                                                        <?php } } ?>
                                                        </ul>
                                                        <ul>
                                                            <?php
                                                            $sql_brand="SELECT * FROM `brand` LIMIT 7,7";
                                                            if ($result_brand=mysqli_query($connection,$sql_brand)){
                                                                while($row_brand=mysqli_fetch_assoc($result_brand)){
                                                                    $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_brand['name'])));
                                                                    ?>

                                                                    <li><a href="brand/<?php echo $row_brand['id']; ?>/<?php echo $url; ?>"><?php echo $row_brand['name']; ?></a></li>

                                                                <?php } } ?>
                                                        </ul>
                                                        <ul>
                                                            <?php
                                                            $sql_brand="SELECT * FROM `brand` LIMIT 14,7";
                                                            if ($result_brand=mysqli_query($connection,$sql_brand)){
                                                                while($row_brand=mysqli_fetch_assoc($result_brand)){
                                                                    $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_brand['name'])));
                                                                    ?>

                                                                    <li><a href="brand/<?php echo $row_brand['id']; ?>/<?php echo $url; ?>"><?php echo $row_brand['name']; ?></a></li>

                                                                <?php } } ?>
                                                        </ul>
                                                        <ul>
                                                            <?php
                                                            $sql_brand="SELECT * FROM `brand` LIMIT 21,7";
                                                            if ($result_brand=mysqli_query($connection,$sql_brand)){
                                                                while($row_brand=mysqli_fetch_assoc($result_brand)){
                                                                    $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_brand['name'])));
                                                                    ?>

                                                                    <li><a href="brand/<?php echo $row_brand['id']; ?>/<?php echo $url; ?>"><?php echo $row_brand['name']; ?></a></li>

                                                                <?php } } ?>
                                                        </ul>

                                                    </div>
                                                </li>
                                                <li><a href="#">contact</a></li>
                                            </center>                                                
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12 v-center">
                                <div class="my-cart">
								<ul class="flex-spacearound-middle">                                    
                                    <li><a href="#" style="margin-top: 9px;"><img src="img/icon-img/wallet.png"></i>My Wallet</a>
                                        <div class="mini-cart-sub">
                                            <div class="flex-spacearound-middle" style="vertical-align: middle;">
                                                <h5>Your Wallet Contains:</h5>&nbsp;
                                                <h4 style="color: #407bea">₹  100</h4>
                                            </div>
                                        </div>
                                    </li>

<!--                                    cart area start-->
                                    <?php

                                        if (empty($_SESSION['cart']) && empty($_SESSION['user_id'])) {
                                            $count_ses=0;
                                            ?>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i>My Cart</a>
                                <span><?php echo $count_ses; ?></span>
                                <div class="mini-cart-sub">

                                <div class="cart-product">

                                        <?php
                                        }elseif(!empty($_SESSION['cart'])){
                                            $count_ses = count($_SESSION['cart']);
                                            ?>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i>My Cart</a>
                                        <span><?php echo $count_ses; ?></span>
                                        <div class="mini-cart-sub">

                                            <div class="cart-product">

                                    <?php
                                        }
                                    ?>




                                                <?php
                                             if(!empty($_SESSION['cart'])&&(empty($_SESSION['user_id']))){
                                               if ($count_ses > 0){
                                                $main_total=null;
                                                $count_se=1;
                                                foreach ($_SESSION['cart'] as $product => $value) {
                                                    $size= $value['size_id'];
                                                    $quan=$value['quantity'];
                                                    $p_id=$product;
                                                    $sql="SELECT `products`.`id` as p_id,`products`.`product_name` as p_name,`products`.`image` as p_image,`products`.`min_order` as p_min_order,`products`.`gst`as p_gst, `stock`.`stock` as s_stock,`stock`.`main_price` as s_price,`size`.`name` as s_name FROM `products` INNER JOIN `stock` ON `products`.`id`=`stock`.`product_id` INNER JOIN `size` ON `stock`.`size_id`=`size`.`id` WHERE `products`.`id`=$p_id AND `stock`.`id`=$size";
                                                    if ($result=mysqli_query($connection,$sql)){
                                                        while ($row=mysqli_fetch_assoc($result)){
                                                            $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['p_name'])));
                                                            $main_total=$main_total+$row['s_price']*$quan;
                                                ?>
                                                <div class="single-cart">
													<div class="cart-img">
														<a href="details/<?php echo $row['p_id']; ?>/<?php echo $url; ?>"><img src="backend/stationary/uploads/<?php echo $row['p_image']; ?>" alt="book" /></a>
													</div>
													<div class="cart-info">
														<h5><a href="details/<?php echo $row['p_id']; ?>/<?php echo $url; ?>"><?php echo $row['p_name']; ?></a></h5>
														<p><?php echo $quan; ?> x <?php echo $row['s_price']; ?></p>
													</div>
													<div class="cart-icon">
													    <a href="php/cart/update_ses_cart.php?id=<?php echo $row['p_id']; ?>"><i class="fa fa-remove"></i></a>
													</div>
												</div>
                                                  <?php } } } ?>
											</div>
											<div class="cart-totals">
												<h5>Total <span>₹<?php echo $main_total; ?></span></h5>
											</div>
											<div class="cart-bottom">
												<a class="view-cart" href="cart">view cart</a>
												<a href="checkout">Check out</a>
											</div>
										</div>
									</li>

                                     <?php }else{
                                                   ?>
                                         <h5>Your cart is empty</h5>
                                         <?php
                                     } }elseif(empty($_SESSION['cart']) && (!empty($_SESSION['user_id']))){
                                         $sql="SELECT `cart`.`id` as c_id,`cart`.`product_id` as c_p_id,`cart`.`size_id` as c_size_id,`cart`.`user_id` as c_user_id,`cart`.`product_quan` as c_product_quan,`size`.`name` as s_name,`stock`.`id` as s_id,`stock`.`product_id` as s_p_id,`stock`.`price` as s_price,`stock`.`main_price` as s_main_price ,`products`.`product_name` as p_name,`products`.`image` as p_image, `products`.`min_order` as p_min_order,`products`.`gst` as p_gst FROM `cart` INNER JOIN `products` ON `cart`.`product_id`=`products`.`id` INNER JOIN `stock` ON `stock`.`id`=`cart`.`size_id` INNER JOIN
                                         `size` ON `size`.`id`=`stock`.`size_id` WHERE `cart`.`user_id`='$_SESSION[user_id]'";
                                         if ($result=mysqli_query($connection,$sql)){
                                         $count=mysqli_num_rows($result);

                                     ?>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i>My Cart</a>
                                        <span><?php echo $count; ?></span>
                                        <div class="mini-cart-sub">

                                            <div class="cart-product">
                                                <?php
                                             if ($count > 0){
                                                $main_total=null;
                                                while ($row=mysqli_fetch_assoc($result)){
                                                    $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['p_name'])));
                                                    $main_total=$main_total+$row['s_main_price']*$row['c_product_quan'];
                                                ?>
                                                    <div class="single-cart">
                                                        <div class="cart-img">
                                                            <a href="details/<?php echo $row['c_p_id']; ?>/<?php echo $url; ?>"><img src="backend/stationary/uploads/<?php echo $row['p_image']; ?>" alt="book" /></a>
                                                        </div>
                                                        <div class="cart-info">
                                                            <h5><a href="details/<?php echo $row['c_p_id']; ?>/<?php echo $url; ?>"><?php echo $row['p_name']; ?></a></h5>
                                                            <p><?php echo $row['c_product_quan']; ?> x <?php echo $row['s_main_price']; ?></p>
                                                        </div>
                                                        <div class="cart-icon">
                                                            <a href="php/cart/update_cart.php?id=<?php echo $row['c_p_id']; ?>"><i class="fa fa-remove"></i></a>
                                                        </div>
                                                    </div>
                                                    <?php } ?>

                                            </div>
                                            <div class="cart-totals">
                                                <h5>Total <span>₹<?php echo $main_total; ?></span></h5>
                                            </div>
                                            <div class="cart-bottom">
                                                <a class="view-cart" href="cart">view cart</a>
                                                <a href="checkout">Check out</a>
                                            </div>
                                        </div>
                                    </li>


                                    <?php }else{


                                             ?>
                                             <h5 style="text-align: center">Your cart is empty</h5>

                                             <?php
                                         } } }  ?>

								</ul>
							</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-mid-area-end -->
                <!-- mobile-menu-area-start -->
                <div class="mobile-menu-area hidden-md hidden-lg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul id="nav">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a>Stationery</a>
                                                <ul>
                                                    <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=3";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                    ?>
                                                    <li><a href="product.php?id=<?php echo $row_cat['id']; ?>"><?php echo $row_cat['cat_name']; ?></a></li>
                                                   <?php } } ?>
                                                </ul>
                                            </li>
                                            <li><a>Art & Craft</a>
                                                <ul>
                                                    <?php
                                                    $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=4";
                                                    if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                        while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                            ?>
                                                            <li><a href="#"><?php echo $row_cat['cat_name']; ?></a></li>
                                                        <?php } } ?>
                                                </ul>
                                            </li>
                                            <li><a>Office Suplies</a>
                                                <ul>
                                                    <?php
                                                    $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=1";
                                                    if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                        while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                            ?>
                                                            <li><a href="#"><?php echo $row_cat['cat_name']; ?></a></li>
                                                        <?php } } ?>
                                                </ul>
                                            </li>
                                            <li><a>Shop By Brand</a>
                                                <ul>
                                                    <?php
                                                    $sql_brand="SELECT * FROM `brand`";
                                                    if ($result_brand=mysqli_query($connection,$sql_brand)){
                                                        while($row_brand=mysqli_fetch_assoc($result_brand)){
                                                            ?>

                                                            <li><a href="#"><?php echo $row_brand['name']; ?></a></li>

                                                        <?php } } ?>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mobile-menu-area-end -->
                <!-- header-bottom-area-start -->
                <div class="header-bottom-area">
                    <div class="container">
                        <div class="row row-mobile">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="header-bottom-search">
                                    <form action="#">
                                        <input type="text" placeholder="Got Something in your mind, Search entire store here..." />
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="row row-desktop">
                            <div class="col-lg-3 col-md-3 col-sm-4">
                                <div class="category-area category-mb">
                                    <h3><a id="showcat">Category Menu <i class="fa fa-bars"></i></a></h3>
                                    <div class="category-menu category-menu-1" id="hidecat" style="display: none">
                                        <nav class="menu">
                                            <ul>
                                                <li class="cr-dropdown"><a>Stationery<i class="none-lg fa fa-angle-down"></i><i class="none-sm fa fa-angle-right"></i></a>
                                                    <div class="left-menu">
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=3 LIMIT 7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                        while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                            $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                        ?>
                                                            <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                        <?php } } ?>
                                                          </span>
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=3 LIMIT 7, 7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                        </span>
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=3 LIMIT 14, 7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                        </span>
                                                         <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=3 LIMIT 21,7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                        </span>

                                                    </div>
                                                </li>
                                                <li class="cr-dropdown"><a>Art & Craft<i class="none-lg fa fa-angle-down"></i><i class="none-sm fa fa-angle-right"></i></a>
                                                    <div class="left-menu">
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=4 LIMIT 7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                          </span>
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=4 LIMIT 7, 7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                        </span>
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=4 LIMIT 14, 7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                        </span>
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=4 LIMIT 21,7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                        </span>

                                                    </div>
                                                </li>
                                                <li class="cr-dropdown"><a>Office Suplies<i class="none-lg fa fa-angle-down"></i><i class="none-sm fa fa-angle-right"></i></a>
                                                    <div class="left-menu">
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=1 LIMIT 7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                          </span>
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=1 LIMIT 7, 7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                        </span>
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=1 LIMIT 14, 7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                        </span>
                                                        <span class="mb-30">
                                                        <?php
                                                        $sql_cat="SELECT * FROM `categories` WHERE `sub_cat_id`=1 LIMIT 21,7";
                                                        if ($result_cat=mysqli_query($connection,$sql_cat)){
                                                            while ($row_cat=mysqli_fetch_assoc($result_cat)){
                                                                $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row_cat['cat_name'])));
                                                                ?>
                                                                <a href="product/<?php echo $row_cat['id']; ?>/<?php echo $url; ?>"><?php echo $row_cat['cat_name']; ?></a>
                                                            <?php } } ?>
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-8">
                                <div class="header-bottom-search">
                                    <form action="search" method="post">
                                        <input type="text" placeholder="Got Something in your mind, Search entire store here..." name="search"/>
                                        <a href="#"><button type="submit" name="submit" style="background-color: #333333;border: none;"><i class="fa fa-search"></i></button></a>
                                    </form>

                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                <!-- header-bottom-area-end -->
            </header>
<style>@media(max-width: 768px){.row-desktop{display: none;}.mobile-sidebar-none{display: none}}@media(min-width: 769px){.row-mobile{display: none;}.v-center{padding-top: 17px}}.language-area h5{padding-top: 10px;font-weight: 500}</style>            
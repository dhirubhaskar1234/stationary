	<div class="shop-left">
		<div class="section-title-5 mb-30">
			<h2>Shopping Options</h2>
		</div><hr>
		<div class="banner-area mb-30">
			<div class="banner-img-2">
				<a href="#"><img src="img/banner/offer-banner.jpg" alt="banner" /></a>
			</div>
		</div>		
		<div class="left-title mb-20">
			<h4>Category</h4>
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
		<div class="left-title mb-20">
			<h4>Manufacturer</h4>
		</div>
		<div class="left-menu mb-30">
			<ul>
                <?php
                $sql="SELECT * FROM `brand`";
                if ($result=mysqli_query($connection,$sql)){
                    while($row=mysqli_fetch_assoc($result)){
                        $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['name'])));
                ?>
				<li><a href="brand/<?php echo $row['id']; ?>/<?php echo $url; ?>"><?php echo $row['name']; ?></a></li>

                <?php } } ?>
			</ul>
		</div>
		<div class="left-title mb-20">
			<h4>Price</h4>
		</div>
		<div class="left-menu mb-30">
			<ul>
				<li><a href="#">₹ 0 - ₹ 200<span>(1)</span></a></li>
				<li><a href="#">₹ 300 - ₹ 390<span>(11)</span></a></li>
				<li><a href="#">₹ 400 - ₹ 490<span>(2)</span></a></li>
				<li><a href="#">₹ 500 - ₹ 590<span>(3)</span></a></li>
				<li><a href="#">₹ 700 - and above<span>(1)</span></a></li>
			</ul>
		</div>
	</div>
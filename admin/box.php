<?php 

include_once "../db/config.php";
include_once "../model/adminDetails.php";
include_once "../model/category_retrieve.php";
include_once "../model/discount_retrieve.php";
include_once "../model/retrieve_notification.php";
include_once "../model/product_retrieve.php";
include_once "../model/banner_retrieve.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/box.css">
	<script src="jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<div class="main-section">
		<div class="dashbord email-content">
			<div class="title-section">
				<p>ADMIN</p>
			</div>
			<div class="icon-text-section">
				<div class="icon-section">		
					
					<!-- <i class="fa fa-envelope-o" aria-hidden="true"></i> -->
				</div>
				<div class="text-section">
					<h1 class="counter"><?php echo $admin_count ?></h1>
					<!-- <span>Admin Count</span> -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="detail-section">
				<a href="#">
					<p>View Detail</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<div class="dashbord download-content">
			<div class="title-section">
				<p>CATEGORIES</p>
			</div>
			<div class="icon-text-section">
				<div class="icon-section">
					<!-- <i class="fa fa-download" aria-hidden="true"></i> -->
				</div>
				<div class="text-section">
					<h1 class="counter"><?php echo $category_count ?></h1>
					<!-- <span>12% have started download</span> -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="detail-section">
				<a href="#">
					<p>View Detail</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<div class="dashbord product-content">
			<div class="title-section">
				<p>COUPONS</p>
			</div>
			<div class="icon-text-section">
				<div class="icon-section">
					<!-- <i class="fa fa-credit-card" aria-hidden="true"></i> -->
				</div>
				<div class="text-section">
					<h1 class="counter"><?php echo $discount_count ?></h1>
					<!-- <span>$ 272 credit in your account</span> -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="detail-section">
				<a href="#">
					<p>View Detail</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>

		<div class="dashbord email-content">
			<div class="title-section">
				<p>USERS</p>
			</div>
			<div class="icon-text-section">
				<div class="icon-section">
					<!-- <i class="fa fa-envelope-o" aria-hidden="true"></i> -->
				</div>
				<div class="text-section">
					<h1 class="counter">200</h1>
					<!-- <span>+7% email list penetration</span> -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="detail-section">
				<a href="#">
					<p>View Detail</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<div class="dashbord download-content">
			<div class="title-section">
				<p>NOTIFICATIONS</p>
			</div>
			<div class="icon-text-section">
				<div class="icon-section">
					<!-- <i class="fa fa-download" aria-hidden="true"></i> -->
				</div>
				<div class="text-section">
					<h1 class="counter"><?php echo $notification_count ?></h1>
					<!-- <span>12% have started download</span> -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="detail-section">
				<a href="#">
					<p>View Detail</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<div class="dashbord product-content">
			<div class="title-section">
				<p>ORDERS</p>
			</div>
			<div class="icon-text-section">
				<div class="icon-section">
					<!-- <i class="fa fa-credit-card" aria-hidden="true"></i> -->
				</div>
				<div class="text-section">
					<h1 class="counter">360</h1>
					<!-- <span>$ 272 credit in your account</span> -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="detail-section">
				<a href="#">
					<p>View Detail</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<div class="dashbord email-content">
			<div class="title-section">
				<p>PRODUCTS</p>
			</div>
			<div class="icon-text-section">
				<div class="icon-section">		
					
					<!-- <i class="fa fa-envelope-o" aria-hidden="true"></i> -->
				</div>
				<div class="text-section">
					<h1 class="counter"><?php echo $product_count ?></h1>
					<!-- <span>+7% email list penetration</span> -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="detail-section">
				<a href="#">
					<p>View Detail</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<div class="dashbord download-content">
			<div class="title-section">
				<p>BANNERS</p>
			</div>
			<div class="icon-text-section">
				<div class="icon-section">
					<!-- <i class="fa fa-download" aria-hidden="true"></i> -->
				</div>
				<div class="text-section">
					<h1 class="counter">23</h1>
					<!-- <span>12% have started download</span> -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="detail-section">
				<a href="#">
					<p>View Detail</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<div class="dashbord product-content">
			<div class="title-section">
				<p>REVENUE</p>
			</div>
			<div class="icon-text-section">
				<div class="icon-section">
					<!-- <i class="fa fa-credit-card" aria-hidden="true"></i> -->
				</div>
				<div class="text-section">
					<h1 class="counter">360</h1>
					<!-- <span>$ 272 credit in your account</span> -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="detail-section">
				<a href="#">
					<p>View Detail</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>
<script>
$('.counter').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>  
</body>
</html>
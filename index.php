<?php include('inc/config.php');
include(ROOT_PATH . "inc/products.php");

$products = get_recent_shirts();
$pageTitle = "Unique T-shirts designed by a frog";
$section = "home";
include(ROOT_PATH . 'inc/header.php'); ?>
	<div class="container">

	<div class="row">
		<!-- Carousel ================================================== -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="item active">
		      <img src="/img/banner-background.jpg" style="width:100%" class="img-responsive">
		      <div class="container">
		        <div class="carousel-caption">
		          <h1>Welcome to my site</h1>
		          <p>Come checkout my shirts!</p>
		          <p><a class="btn btn-large btn-primary" href="./shirts/">Learn more</a></p>
		        </div>
		      </div>
		    </div>
		    <div class="item">
		      <img src="/img/banner-background2.jpeg" class="img-responsive">
		      <div class="container">
		        <div class="carousel-caption">
		          <h1>HTML/CSS Themed Shirts</h1>
		        </div>
		      </div>
		    </div>
		    <div class="item">
		      <img src="/img/banner-background3.jpeg" class="img-responsive">
		      <div class="container">
		        <div class="carousel-caption">
		          <h1>Dozens of Shirts to Choose from</h1>
		          <p><a class="btn btn-large btn-primary" href="./search/">Search now</a></p>
		        </div>
		      </div>
		    </div>
		  </div>
		  <!-- Controls -->
		  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		    <span class="icon-prev"></span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		    <span class="icon-next"></span>
		  </a>  
		</div>
		<!-- /.carousel -->

		</div> <!-- End Row -->

		<h2>Mike&rsquo;s Latest Shirts</h2>
		<div class="row">
                    <?php 
						foreach ($products as $product){
                            include(ROOT_PATH . "inc/partial-product-list-view.html.php");
						}
					?>						
		</div>
	</div>

<?php include(ROOT_PATH . 'inc/footer.php') ?>
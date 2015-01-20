<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700" type="text/css">
	
	-->
	<link rel="shortcut icon" href="/favicon.ico">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/styles.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/fonts/font-awesome/css/font-awesome.min.css">

</head>
<body>
	<div class="navbar navbar-inverse navbar-static-top">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="/">Shirts4Mike</a>
	    </div>
	    <div class="collapse navbar-collapse" style="">
	        <ul class="nav navbar-nav">
				<li class="shirts <?php if ($section == "shirts") { echo "active"; } ?>"><a href="/shirts/">Shirts</a></li>
				<li class="contact <?php if ($section == "contact") { echo "active"; } ?>"><a href="/contact/">Contact</a></li>
				<li class="search <?php if ($section == "search") { echo "active"; } ?>"><a href="/search/">Search</a></li>
				<li class="cart"><a target="paypal" href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&amp;business=Q6NFNPFRBWR8S&amp;display=1">Shopping Cart</a></li>
			</ul>
	    </div>
	    <!--/.nav-collapse -->
	</div>

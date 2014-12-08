<?php
/* This file displays a list of products matching the search term in the query string. 
 */

	include("../inc/config.php");
	include(ROOT_PATH . "inc/products.php");

	$search_term = "";
	$products = array();

	if (isset($_GET["search"])){
		$search_term = trim($_GET["search"]);
		if ($search_term != ""){
			$products = get_products_search($search_term);
		}
	}

	echo json_encode($products);
?>
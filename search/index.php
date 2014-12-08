<?php 
	require_once("../inc/config.php");

	$search_term = "";
	if (isset($_GET["search"])){
		$search_term = trim($_GET["search"]);
		if ($search_term != ""){
			require_once(ROOT_PATH . "inc/products.php");
			$search_products = get_products_search($search_term);
		}
	}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/js/action.js"></script>
<?php 
$pageTitle = "Search";
$section = "search";
include(ROOT_PATH . 'inc/header.php');
?>


		<div class="section search shirts page">

			<div class="wrapper">
				<h1>Search</h1>
				<form action="./" method="GET">

					<input type="text" name="search" id="search" value="<?php echo htmlspecialchars($search_term); ?>">
					<input type="submit" value="Search">

				</form>
				<div class="results">
					<?php if ($search_term != ""){
						if (!empty($search_products)) { ?>
							<ul class="products">
								<?php foreach($search_products as $product){
									include(ROOT_PATH . "inc/partial-product-list-view.html.php");
								} ?>
							</ul>
						<?php } else { ?> 
							<p>No products were found for the search term <?php echo htmlspecialchars($search_term); ?> </p>
						<?php } ?>
					<?php } ?>
				</div>

			</div>

		</div>

<?php include(ROOT_PATH . 'inc/footer.php') ?>
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
<?php 
$pageTitle = "Search";
$section = "search";
include(ROOT_PATH . 'inc/header.php');
?>


		<div class="container">

				<h1 class="page-title">Search</h1>
				<div class="row">
				<div class="col-md-8">
					<form action="./" method="GET">
						<div class="input-group">
							<input class="form-control" type="text" name="search" id="search" value="<?php echo htmlspecialchars($search_term); ?>">
							<div class="input-group-btn">
								<input class="btn btn-default" type="submit" value="Search">
							</div>
						</div>
					</form>
				</div>
				</div>
				<div class="results row">
					<?php if ($search_term != ""){
						if (!empty($search_products)) { ?>
								<?php foreach($search_products as $product){
									include(ROOT_PATH . "inc/partial-product-list-view.html.php");
								} ?>
						<?php } else { ?> 
							<p>No products were found for the search term <?php echo htmlspecialchars($search_term); ?> </p>
						<?php } ?>
					<?php } ?>
				</div>
		</div>

<?php include(ROOT_PATH . 'inc/footer.php') ?>
<?php

/* This file displays a single product in a list view. It needs to receive
 * the following product details (as elements of an array named $product): 
 *     - sku:  Product ID, used to create the link to the Shirt Details page
 *     - img:  The web address of the main image for the product
 *     - name: The name of the 
 */

?>
<div class="col-xs-12 col-sm-6 col-md-3">
	<div class="product-item">
		<div class="photo">
			<a href="<?php echo BASE_URL; ?>shirts/<?php echo $product["sku"]; ?>/">
				<img class="img-responsive" src="<?php echo BASE_URL . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>">
        	</a>
		</div>
		<p class="product-name text-center">
			<?php echo $product["name"] ?>
		</p>
		<div class="info">
            <div class="price">
                <span class="value"><?php echo $product["price"] ?></span>
                <span class="stock pull-right">in stock</span>
            </div>
        </div>

        <div class="actions">
                <a class="btn btn-cart btn-block clear-left" href="<?php echo BASE_URL; ?>shirts/<?php echo $product["sku"]; ?>/">View Details</a>
        </div>
    </div>
</div>
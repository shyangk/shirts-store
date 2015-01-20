$('document').ready(function(){
	var displayResult = function(data){
		if ($.isEmptyObject(data)){
			$(".results").html('<p>There were no results for the search term ' + $search_term + '</p>');
		} else {
			var results = '';
			$.each(data, function(key, val){
				results += '<div class="col-xs-12 col-sm-6 col-md-3"><div class="product-item">';

				results += '<div class="photo">';
				results += '<a href="/shirts/' + val["sku"] + '">';
				results += '<img src="/' + val["img"] + '" alt="' + val["name"] + '">';
				results += '</a>';
				results += '</div>';

				results += '<div class="product-name text-center">';
				results += val["name"];
				results += '</div>';

				results += '<div class="info"><div class="price">';
				results += '<span class="value">' + val["price"] + '</span>';
				results += '<span class="stock pull-right">in stock</span>';
				results += '</div></div>';

				results += '<div class="actions"><div class="clear-left">';
				results += '<a class="btn btn-cart btn-block" href="cart.html"><i class="fa fa-shopping-cart"></i> Add to cart</a>';
				results += '</div></div>';

				results += '</div></div>';   
			});
			$(".results").html(results);

		}
	};

	window.onhashchange = function(){
		if (location.hash){
			 $search_term = location.hash.slice(1);
			 $.getJSON('../inc/searchAJAX.php?search=' + $search_term, displayResult);
		}
	}

	$('form').submit(function(event){
		event.preventDefault();
		$search_term = $('#search').val();

		//search is handled by onhashchange listener
		location.hash = $search_term;
		
	});	
});
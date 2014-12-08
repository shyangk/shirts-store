$('document').ready(function(){
	var displayResult = function(data){
		if ($.isEmptyObject(data)){
			$("#content .results").html('<p>There were no results for the search term ' + $search_term + '</p>');
		} else {
			location.hash = $search_term;
			var results = '<ul class="products">';
			$.each(data, function(key, val){
				results += '<li>';
				results += '<a href="/shirts/' + val["sku"] + '">';
				results += '<img src="/' + val["img"] + '" alt="' + val["name"] + '">';
				results += '<p>View Details</p>';
				results += '</a>';
				results += '</li>';   
			});
			results += '</ul>';   
			$("#content .results").html(results);
		}
	};

	//diplay the previous search if the hash is set
	if (location.hash){
		 var $search_term = location.hash.slice(1);
		 $.getJSON('../inc/searchAJAX.php?search=' + $search_term, displayResult);
	}

	$('form').submit(function(event){
		event.preventDefault();
		$search_term = $('#search').val();

		//search for shirts, otherwise display message to user
		if ($search_term){
			$.getJSON('../inc/searchAJAX.php?search=' + $search_term, displayResult);
		}
		
	});	
});
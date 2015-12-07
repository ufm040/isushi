function handleAjaxError(){
	console.log("fail");
}

// initialisation du panier si celui-ci est vide => on le cache
function init(){
	$.ajax({
		"url": "libs/initproduct.php",
		"type": "POST",
	})
	.done(function(response){
		$add = $("#fix-menu sup").html(response);
		if (response > 9) {
			$("#fix-menu sup").css("padding","6");	
		}
		$add.show();
	})
	.fail(handleAjaxError)	
}
init();




function addBasket(e){
	e.preventDefault();
	console.log(this);
	$t = this ;
	console.log($t);

	$product = this.dataset.product;
	console.log($product);
	$elem = $(this).prev(".myform").children(".qty");
	console.log($elem);
	$qty = $elem.val();
	console.log($qty);
	//$price = $elem.children("#price").val();
	$.ajax({
		"url": "libs/addproduct.php",
		"type": "POST",
		"data": {
			"product":$product,
			"qty":$qty
		},
	})
	.done(function(response){
		$add = $("#fix-menu sup").html(response);
		if (response > 9) {
			$("#fix-menu sup").css("padding","6");	
		}
		$add.show();
	})
	.fail(handleAjaxError);
}



$(".basketAdd").on("click", addBasket);


function handleAjaxError(){
	console.log("fail");
}


function addBasket(e){
	e.preventDefault();
	console.log(this);
	$.ajax({
		"url": "libs/addproduct.php",
		"type": "POST"
	})
	.done(function(response){
		console.log('produit ajouté');
	})
	.fail(handleAjaxError);
}



$(".one-product button").on("click", addBasket);
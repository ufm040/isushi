
function handleAjaxError(){
	console.log("fail");
}


function addCommande(e){
	e.preventDefault();
	$.ajax({
		"url": "libs/addcommande.php",
		"type": "POST",
	})
	.done(function(response){
		console.log(response);
		$("#commande").hide();
		
	})
	.fail(handleAjaxError);
}

$("#commande").on("click", addCommande);
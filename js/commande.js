
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

function subArticle(e){
	e.preventDefault();
	console.log("moins");
	$elem = $(this).prev(".myform").children(".qty");

}

function addArticle(e){
	e.preventDefault();
	console.log("plus");	
}


$(".subarticle").on("click",subArticle);

$(".addarticle").on("click",addArticle);
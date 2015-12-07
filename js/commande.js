
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

function updateValue($elem,$qty) {
	$elem.attr("value",$qty);
	$priceUnit = $elem.parent('li').prev().children(".price").html();
	$total = $qty * $priceUnit;
	$elem.parent('li').next().children(".totalprice").html($total);
	$totalpanier = $('#totalpanier').children().children().html();
	$totalpanier = parseInt($totalpanier)+parseInt($priceUnit);
	$('#totalpanier').children().children().html($totalpanier);	
}


function subArticle(e){
	e.preventDefault();
	$elem = $(this).next('.qty');
	$qty =  parseInt($elem.val()) - 1;
	updateValue($(this),$qty);
}

function addArticle(e){
	e.preventDefault();

	$elem = $(this).prev('.qty');
	$qty =  parseInt($elem.val()) + 1;

	$elem.attr("value",$qty);
	$t = $(this).parent('li').prev().children(".price").html();

	$total = $qty * $t;
	$(this).parent('li').next().children(".totalprice").html($total);
	
	$totalpanier = $('#totalpanier').children().children().html();
	$totalpanier = parseInt($totalpanier)+parseInt($t);

	$('#totalpanier').children().children().html($totalpanier);
		
}


$(".subarticle").on("click",subArticle);

$(".addarticle").on("click",addArticle);
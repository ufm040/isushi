
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

function updateValue($this,$ope) {
	if ($ope) {
		console.log("moins");
		$elem = $this.next('.qty');
		$qty =  parseInt($elem.val()) - 1;
	} else {
		console.log("plus");
		$elem = $this.prev('.qty');
		$qty =  parseInt($elem.val()) + 1;
	}

	$elem.attr('value',$qty);

	$priceUnit = $this.parent('li').prev().children(".price").html();
	$total = $qty * $priceUnit;

	$this.parent('li').next().children(".totalprice").html($total);

	$totalpanier = $('#totalpanier').children().children().html();

	if ($ope) {
		$totalpanier = parseInt($totalpanier)-parseInt($priceUnit);
	} else {
		$totalpanier = parseInt($totalpanier)+parseInt($priceUnit);	
	} 

	$('#totalpanier').children().children().html($totalpanier);		
} 


function subArticle(e){
	e.preventDefault();
	updateValue($(this),1);
}

function addArticle(e){
	e.preventDefault();
	updateValue($(this),0);		
}


$(".subarticle").on("click",subArticle);

$(".addarticle").on("click",addArticle);
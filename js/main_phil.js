// cache le contenu du formulaire nouveau client (classe cache-form)
$(".cache-form").hide();

// mise sous écoute du titre "Nouveau client" (classe title-new-client)
$(".title-new-client").on("click", function () {
	$(this).next().slideToggle(".cache-form");
});
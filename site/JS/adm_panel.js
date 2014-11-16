$(document).ready( function()
{ // quand la page a fini de se charger
	/*$("#list-photos").sortable({
		// initialisation de Sortable sur #list-photos
		placeholder: 'highlight',
		// classe à ajouter à l'élément fantome
		update: function()
		{  // callback quand l'ordre de la liste est changé
			var order = $('#list-photos').sortable('serialize');
			// récupération des données à envoyer
			console.log(order);
			$.post('ajax.php', order);
			// appel ajax au fichier ajax.php avec l'ordre des photos
		}
  	});
  	$("#list-photos").disableSelection();
	// on désactive la possibilité au navigateur de faire des sélections
    $("#datepicker").datepicker();*/
	$(document).on('click', "a.edit-promo", function() {
		console.log( $(this).attr('value') );
	});
	$(document).on('click', "a.delete-promo", function() {
		console.log( $(this).attr('value') );
	});

	$.getJSON( "index.php/fonction_file/list_promo", function( data )
	{
	  	var promos = [];
		console.log( data );
	  	$.each( data, function( key, val )
		{
			var id = val['id'];
			promos.push( '<tr id="'
							+ id
							+ '"><td>'
							+ val['libelle']
							+ '</td><td>' // OPTION DE LA LISTE
							+ '<a  class="edit-promo" title="Modifier le nom" value="'
							+ id
							+ '"><span class="glyphicon glyphicon-pencil"></span></a> '
							+ '<a  class="delete-promo" title="Supprimer la promo" value="'
							+ id
							+ '"><span class="glyphicon glyphicon-ban-circle"></span></a>'
							+ '</td></tr>' );
	  	});
		$('#list_promos').html( promos );
	});
});

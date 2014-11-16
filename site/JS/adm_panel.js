$(document).ready( function()
{ // quand la page a fini de se charger
	load_data();


	/**
	 * ACTION SUR LE BOUTON EDITER D UNE PROMO
	 */
	$(document).on('click', "a.edit-promo", function()
	{
		var but 	= $(this);
		var tr = but.parent().parent().find('td');
		var td 		= $( tr ).first();
		var value 	= td.text();

		td.html('<input class="in-prom" type="text" value="' + value + '">');
		td.find('input').focus();

		$('.in-prom').keyup(function (e)
		{
			if (e.keyCode == 13 )
			{
				//alert('text');
				var id = $(this).parent().parent().attr('id');
				if( id != '18' )
				{
					$.ajax(
					{
						url: 'index.php/fonction_file/edit_promo/' + id,
						method: 'Post',
						data:{
							'new_name': $(this).val(),
						}
					})
					.success( function ( data)
					{
						$('#notification').html(data);
					})
					.fail( function( e, t)
					{
						console.log( e + t);
						alert("Impossible d'effectuer cette action...");
					});
					var val = $(this).val();
					$(this).parent().html(val);
				}
			}
		});
	});

	/**
	 * [[Description]]
	 */
	$(document).on('click', "a.delete-promo", function()
	{
		console.log( $(this).attr('value') );
		var choix = confirm("Etes-vous sur de vouloir supprimer cette promo:\n "
						+ $(this).parent().parent().first().text() );
		if ( choix == true && $(this).attr('value') != '18')
		{
			$.ajax(
			{
				url: 'index.php/fonction_file/remove_promo/' + $(this).attr('value'),
			})
			.success( function( data )
			{
				$('#notification').html( data );
				load_data();
			})
			.fail( function( e, t )
			{
				console.log( e + t );
				alert("Impossible d'effectuer cette action...");
			});
		}
	});

	$('#add-promo').click( function()
	{

	});
});


/**
 * REMPLI LA LISTE DES PROMOTIONS
 */
function load_data(){
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
}

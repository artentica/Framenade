jQuery(document).ready(function($) 
{
	var sel 		= $('#SelectPromo');
	var conteneur 	= $('#conteneur');

// CHARGMENT DES CATEGORIES ( APL BDD LENT DONC TRANSVASÉ COTÉ CLIENT )
	$.ajax( 
	{
		url: '../include/fonction.php',
		dataType: 'json',
		data: 
		{
			action: 'promos'
		},
	})
	.done(function( data ) 
	{
		console.log("success promo changed");
		$.each( data, function(key, value) 
		{
		    sel.append('<option value=' + value + '>' + value + '</option>');
		});
	})
	.fail(function( jqXHR, textStatus ) 
	{
		alert("Erreur de chargement de données: " + textStatus);
	});

// CHANGEMENT DU SELECT PROMO
	sel.change(function(event) 
	{ 
		conteneur.parent().removeClass('animated bounceInRight');
		console.log('changement de promo ' + sel.val() );
		$.ajax(
		{
			url: '../include/fonction.php',
			type: 'GET',
			dataType: 'json',
			data: 
			{
				action: 'files',
				promo: sel.val()
			},
		})
		.done(function( data ) 
		{
			var contenu = "";
			$.each( data, function(key, value) 
			{
				var classe = (value.promo == "")? "file_com" : "file_spe" ;

		    	contenu += '<tr class="'
		    			+ classe
		    			+ '"><td>'
		    			+ value.rang
		    			+ '</td><td>'
		    			+ value.libelle 
		    			+'</td><td><a href="'
		    			+ value.fichier 
		    			+'"><span class="glyphicon glyphicon-download"></span</a></td></tr>';
			});
			conteneur.parent().addClass('animated bounceInRight');
			conteneur.html (contenu);
		})
		.fail(function( e, t) 
		{
			console.log(e+t);
		});
	});
});
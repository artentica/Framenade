jQuery(document).ready(function($) 
{
	var sel 		= $('#SelectPromo');
	var conteneur 	= $('#conteneur');
	var zip_zone    = $('#zip_zone');
	var exist_deja	= ( $('#nom_fils').val() != "" );

	if(exist_deja) promo_load();

// CHANGEMENT DU SELECT PROMO
	sel.change(function(event) 
	{ 
		conteneur.parent().removeClass('animated bounceInRight');
		console.log('changement de promo ' + sel.val() );
		$.ajax(
		{
			url: 		'index.php/fonction',
			type: 		'GET',
			dataType: 	'json',
			data: 
			{
				action: 'files',
				promo: sel.val()
			},
		})
		.done(function( data ) 
		{
			var contenu = "";
			$.each( data, function(key, value) //MET EN FORME DE JSON VERS <TABLE>
			{
				var classe = (value.promo == "18")? "file_com" : "file_spe" ; //18 correspond a la promo tous

		    	contenu += '<tr class="'
		    			+ classe
		    			+ '"><td>'
		    			+ value.rang
		    			+ '</td><td>'
		    			+ value.libelle 
		    			+'</td><td><a target="_BLANK" href="pdf/'
		    			+ value.fichier 
		    			+'"><img class="img-responsive extension_pdf" src="images/pdf.png"><span class="glyphicon glyphicon-download"></span</a></td></tr>';
			});
			conteneur.parent().addClass('animated bounceInRight');
			conteneur.html (contenu);
			$('#files_count').text( data.length );  // ENVOI LE NOMBRE DE FICHIERS
			$('#promo_libelle').text( 	$('option:selected').text()	);	//ENVOI LE LIBELLE DE LA PROMO AU LIEN ZIP

			var linkA = $('option:selected').val();
			var link = "index.php/fonction?action=zip&promo=" + linkA ;

			$('#promo_zip_link').attr('href', link );
			zip_zone.show();
		})
		.fail(function( e, t) 
		{
			console.log(e+t);
		});
	});

// ENREGISTREMENT DES DONNEES DU FORMULAIRE
	$('#data').on('submit', function(e) {
		e.preventDefault(); // empeche l'envoi du formulaire normal

		$.ajax({
            url: $(this).attr('action'), 		// Le nom du fichier indiqué dans le formulaire
            type: $(this).attr('method'), 		// méthode indiquée dans le formulaire (get ou post)
            dataType: 'html',
            data: $(this).serialize(), 			// sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
            success: function( data ) 
            { 									// récupère la réponse du fichier PHP
                $('#notif').html(data);
                promo_load();
            }
        });	
        return false;
	});

// CHARGMENT DES CATEGORIES ( APL BDD LENT DONC TRANSVASÉ COTÉ CLIENT )
	function promo_load()
	{
		$.ajax( 
		{
			url: 		'index.php/fonction',
			dataType: 	'json',
			data: 
			{
				action: 'promos'
			},
		})
		.done(function( data ) 
		{
			console.log("success promo changed");
			$.each( data, function(key, value) 		// PERMET DE REMPLIR LE SELECT AVEC LA LISTE DE TOUTES LES PROMOS
			{
			    sel.append('<option value=' + value.id + '>' + value.libelle + '</option>');
			});
		})
		.fail(function( jqXHR, textStatus ) 
		{
			alert("Erreur de chargement de données: " + textStatus);
		});
	}
});
jQuery(document).ready(function($) 
{
	var sel 		= $('#SelectPromo');
	var conteneur 	= $('#conteneur');

// CHARGMENT DES CATEGORIES ( APL BDD LENT DONC TRANSVAS� COT� CLIENT )
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
		$.each( data, function(key, value) 		// PERMET DE REMPLIR LE SELECT AVEC LA LISTE DE TOUTES LES PROMOS
		{
		    sel.append('<option value=' + value.id + '>' + value.libelle + '</option>');
		});
	})
	.fail(function( jqXHR, textStatus ) 
	{
		alert("Erreur de chargement de donn�es: " + textStatus);
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
			$.each( data, function(key, value) //MET EN FORME DE JSON VERS <TABLE>
			{
				var classe = (value.promo == "18")? "file_com" : "file_spe" ;

		    	contenu += '<tr class="'
		    			+ classe
		    			+ '"><td>'
		    			+ value.rang
		    			+ '</td><td>'
		    			+ value.libelle 
		    			+'</td><td><a href="'
		    			+ value.fichier 
		    			+'"><img class="img-responsive extension_pdf" src="../images/pdf.png"><span class="glyphicon glyphicon-download"></span</a></td></tr>';
			});
			conteneur.parent().addClass('animated bounceInRight');
			conteneur.html (contenu);
			$('#files_count').text( 	data.length );  // ENVOI LE NOMBRE DE FICHIERS
			$('#promo_libelle').text( 	sel.val() 	);	//ENVOI LE LIBELLE DE LA PROMO A LIEN ZIP
			$('#promo_zip_link').attr('href', '../include/fonction.php?action=zip&prom="' + sel.val() +'"' );
		})
		.fail(function( e, t) 
		{
			console.log(e+t);
		});
	});

// ENREGISTREMENT DES DONNEES DU FORMULAIRE
	$('#data').on('submit', function(e) {
		e.preventDefault();

		$.ajax({
            url: $(this).attr('action'), // Le nom du fichier indiqu� dans le formulaire
            type: $(this).attr('method'), // La m�thode indiqu�e dans le formulaire (get ou post)
            data: $(this).serialize(), // Je s�rialise les donn�es (j'envoie toutes les valeurs pr�sentes dans le formulaire)
            success: function(html) 
            { // Je r�cup�re la r�ponse du fichier PHP
                alert(html); // J'affiche cette r�ponse
            }
        });	
        return false;
	});
});
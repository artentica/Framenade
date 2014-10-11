jQuery(document).ready(function($) {

	var sel 		= $('#SelectPromo');
	var conteneur 	= $('#conteneur');

	function sortByPlace(k1, k2){  
			//return key1.rang > key2.rang;  
			if ( k1.promo > k2.promo )
				return 1;
			else if ( k1.promo < k2.promo )
			   	return -1;
			else if ( k1.rang > k2.rang )
			   	return 1;
			 else
			 {
			 	return 0;
			 }
	}  







	$.ajax( // CHARGMENT DES CATEGORIES ( APL BDD LENT DONC TRANSVASÉ COTÉ CLIENT )
	{
		url: '../include/fonction.php',
		dataType: 'json',
		data: {search: 'promos'},
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





	sel.change(function(event) { // CHANGEMENT DU SELECT PROMO
		
		console.log('changement de promo ' + sel.val() );
		$.ajax(
		{
			url: '../include/fonction.php',
			type: 'GET',
			dataType: 'json',
			contentType: "charset=utf-8", 
			data: 
			{
				search: 'files',
				promo: sel.val()
			},
		})
		.done(function( data) 
		{
			data.sort(sortByPlace);  // TRI SELON FONCTION
			console.log(data);
			var contenu ="";
			$.each( data, function(key, value) 
			{
				if (value.promo == "")
				{
					var classe = "file_com";
				}
				else
				{
					var classe = "file_spe";
				}

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
			conteneur.html (contenu);
		})
		.fail(function( e, t) 
		{
			console.log(e+t);
		});
	});
});
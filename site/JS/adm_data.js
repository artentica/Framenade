$( document ).ready( function()
{
	load_data();
	$('#lightbox').hide();
/*===============================================================================
				MOTEUR DU CHAMPS DE RECHERCHE PAR NOM
===============================================================================*/
	$("#search_nom").on("keyup", function()
	{
		var value = $(this).val();
		//console.log(value);
		$("#table_data tr").each(function(index)
		{
			$row = $(this);
			var id = $row.find("td:first").text();

			if (id.indexOf(value) != 0)
			{
				$(this).hide();
			}
			else
			{
				$(this).show();
			}
		});
	});

/*===============================================================================
				ACTIONS DE GESTION
===============================================================================*/
	/**
	 * ACTION LORS DE L APPUIE SUR LA CORBEILLE
	 */
	$("body").on("click", ".remove", function(e)
	{
		val = $(this).val();
		console.log('remove ' + val);
		$.ajax(
		{
			url: 		'index.php/fonction_data/remove/' + val,
			type: 		'GET',
			dataType: 	'html',
		})
		.done(function( data )
		{
			$('#notification').html( data );
			load_data();
		})
		.fail( function( e, t)
		{
			alert('Impossible de joindre le serveur pour effectuer cette action...');
			console.log( e + t );
		});
	});

	/**
	 * ACTION LORS DU CLIC SUR EDITION, OUVRE LA LIGHTBOX
	 */
	$("body").on("click", ".edit", function(e)
	{
		var LB 		= $('#lightbox');
		var info	= $(this);
		LB.show();

		$.ajax(
		{
			url: 		'index.php/fonction_data/userInfo/' + info.val() ,
			type: 		'GET',
			dataType: 	'json',
		})
		.done(function( data )
		{
			etudiant = data[0];
			//console.log( etudiant );
			$('#id').val( etudiant['id'] );
			$('#nom_fils').val( etudiant['nom_fils'] );
			$('#prenom_fils').val( etudiant['prenom_fils'] );
			$('#identifiant').val( etudiant['identifiant'] );
			$('#tel_mobile').val( etudiant['tel_mobile'] );
			$('#courriel').val( etudiant['courriel'] );
			$('#ddn_fils').val( etudiant['ddn_fils'] );
			LB.addClass('animated rollIn');
		}).fail( function( e, t)
		{
			alert('Impossible de recuperer les informations...');
			console.log( e + t );
			LB.hide();
		});
	});

	/**
	 * ACTION POUR SAUVEGARDER LES DONNEES MODIFIEES
	 */
	$('#save').click( function(e)
	{
		e.preventDefault();
		var $this = $("#lightbox form"); // L'objet jQuery du formulaire
		$.ajax(
		{
			url: 		'index.php/fonction_data/edition',
			type: 		'POST',
			dataType: 	'html',
			data:		$this.serialize(),
		})
		.done( function( data )
		{
			$('#notification').html( data );
			load_data();
			$('#cancel').click();
		})
		.fail( function( e, t )
		{
			alert('Impossible d\'effectuer l\'action.');
			console.log(e + t);
		});
	});
	$("#cancel").click( function(e)
	{
		e.preventDefault();
		var LB = $('#lightbox');
		LB.hide(700);
		LB.removeClass('rollIn');
	});
/*===============================================================================
				CHARGEMENT DES DONNEES
===============================================================================*/
	/**
	 * PERMET DE RECUPERER L INTEGRALITEE DES DONNEES RENTREES
	 */
	function load_data()
	{
		$.ajax(
		{
			url: 		'index.php/fonction_data/list_data',
			type: 		'GET',
			dataType: 	'json',
		})
		.done(function( data )
		{
			console.log( data );
			Str = '';

			$.each( data, function(key, etudiant) //MET EN FORME DE JSON VERS <TABLE>
			{
				Str += '<tr><td title="Inscrit le: '+ etudiant['date'] +'">'
					+ etudiant['nom_fils'] + ' ' + etudiant['prenom_fils']
					+ '</td><td>'
					+ etudiant['identifiant']
					+ '</td><td>'
					+ '<a href="tel:' + etudiant['tel_mobile'] + '">'
					+ etudiant['tel_mobile']
					+ '</a>'
					+ '</td><td>'
					+ '<a href="mailto:' + etudiant['courriel']	+ '">'
					+ etudiant['courriel']
					+ '</a>'
					+ '</td><td>'
					+ etudiant['ddn_fils']
					+ '</td><td>'
					+ '<a target="_TOP" href="http://www.localiser-ip.com/?ip='	+ etudiant['ip'] + '">'
					+ etudiant['ip']
					+'</a>'
					+ '</td><td>'
					/*	ACTION POSSIBLE POUR L ETUDIANT	*/
					+ '<button class="remove btn btn-danger btn-sm" value="'
					+ etudiant['id']
					+'" ><span class="glyphicon glyphicon-trash"></span></button>'
					+ '<button class="edit btn btn-primary btn-sm"  value="'
					+ etudiant['id']
					+'" ><span class="glyphicon glyphicon-pencil"></span></button>'
					+ '</td></tr>';
			});
			$('#table_data').html( Str ); // REMPLI LE TABLEAU
		})
		.fail( function( e, t )
		{
			alert('Impossible de charger les données');
		});
	}
});


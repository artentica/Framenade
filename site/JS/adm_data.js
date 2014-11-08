$( document ).ready( function(){
	
	etudiants = [];
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
				+ '<a href="tel:' + etudiant['tel_mobile'] + '">' + etudiant['tel_mobile'] + '</a>'
				+ '</td><td>'
				+ '<a href="mailto:' + etudiant['courriel']	+ '">' + etudiant['courriel']
				+ '</a>'
				+ '</td><td>'
				+ etudiant['ddn_fils']
				+ '</td><td>'
				+ '<a target="_TOP" href="http://www.localiser-ip.com/?ip=' + etudiant['ip'] + '">' + etudiant['ip'] +'</a>'
				+ '</td><td>'
				/*	ACTION POSSIBLE POUR L ETUDIANT	*/
				+ '<button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>'
				+ '</td></tr>';
		});	
		
		$('#table_data').html( Str );
		
		
		
	})
	.fail( function( e, t )
	{
		alert('Impossible de charger les données');
	});



	$("#search_nom").on("keyup", function() {
		var value = $(this).val();
		//console.log(value);
		$("#table_data tr").each(function(index) {

			$row = $(this);

			var id = $row.find("td:first").text();

			if (id.indexOf(value) != 0) {
				$(this).hide();
			}
			else {
				$(this).show();
			}
		});
	});
});

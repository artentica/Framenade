$( document ).ready( function(){
	
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
		$.each( data, function(key, value) //MET EN FORME DE JSON VERS <TABLE>
		{
			Str += '<tr><td>' + value[1] + '</td><td>'
				+  value[2] +'</td></tr>';
		});	
		
		$('#table_datas').html( Str );
		
		
		
	})
	.fail( function( e, t )
	{
		alert('Impossible de charger les données');
	});
});
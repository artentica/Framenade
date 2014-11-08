jQuery(document).ready(function($) {

	$('ul li a').each(function()
	{
		if( this.href == window.location.href)
		{
			$(this).parent().addClass('active');
		}




	});
});

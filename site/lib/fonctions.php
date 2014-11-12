<?php
	/*
				FONCTIONS REUTILISEES SOUVENT
	*/

	/**
	 * VERIFIE SI L UTILISATEUR EST CONNECTER, PROTEGE LES DONNEES SINON
	 */
	function is_log()
	{
		if( empty($_SESSION['connect_adm']) OR $_SESSION['connect_adm'] == false )
		{
			flash(0, 'has-error');
			header('Location:' . url_for('/administration_accueil') );
		}
	}

	/**
	 * RETOURNE UNE NOTIFICATION SOUS FORME HTML
	 * @param   String   $style   (success, warning, info, danger)
	 * @param   [[Type]] $content contenu de la notification ( texte )
	 * @returns String   forme html de la notification
	 */
	function notif( $style, $content )
	{
		return '<div class="alert alert-' . $style . ' alert-dismissible" role="alert">
			  		<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
			  			<span class="sr-only">Close</span>
					</button>'. $content .'
				</div>';
	}
?>

<?php
	function logout()
	{
		session_destroy();
		header('Location:' . url_for('/'));
	}
?>
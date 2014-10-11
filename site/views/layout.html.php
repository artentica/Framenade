<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../CSS/bootstrap.min.css">
	<title><?php echo h($page_title) ?></title>
	<?php if(!empty($link)):
		echo $link;
	endif;
	?>
</head>
<body>
	<?php if(!empty($header)):
		echo $header;
	endif; ?>
	<div class="body">
		<?php echo $body;?>
	</div>
	<?php if(!empty($footer)):
		echo $footer;
	endif;
	?>
	<script type="text/javascript" src="../JS/jquery.min.js"></script>
	<script type="text/javascript" src="../JS/bootstrap.min.js"></script>
	<?php 
		if(!empty($js_foot)):
			echo $js_foot;
		endif;
	?>
</body>
</html>
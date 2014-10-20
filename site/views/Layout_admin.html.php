<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
</body>
</html>
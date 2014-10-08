<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo h($page_title) ?></title>
</head>
<body>
	<?php if(!empty($header)):
		echo $header;
	endif; ?>
	<div class="body">
		<?php echo $body;?>
	</div>
</body>
</html>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/adm_panel.css">
	<title><?php echo h($page_title) ?></title>
	<?php if(!empty($link)):
		echo $link;
	endif;
	?>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="javascript:void(0)">
			<img src="Images/logo_ISEN.png" style="height: 50px;background-color: white;">
			</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="javascript:void(0)">Link</a></li>
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="javascript:void(0)">Action</a></li>
						<li><a href="javascript:void(0)">Another action</a></li>
						<li><a href="javascript:void(0)">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="javascript:void(0)">Separated link</a></li>
					</ul>
				</li>
			</ul>
			<!--form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form-->
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?= url_for('logout'); ?>">Deconnexion</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->

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
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<?php 
		if(!empty($js_foot)):
			echo $js_foot;
		endif;
	?>
</body>
</html>
<?php content_for('header'); ?>
<img src="../images/logo_ISEN.png" align="center">
<?php end_content_for();?>

<?php content_for('body'); ?>

<?php 
	print_r( query('SELECT * FROM data') ); ?>








<?php end_content_for(); ?>
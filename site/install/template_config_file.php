<?php $template = "
<?php
##########################################################################
##################### FICHIER DE CONFIGURATION ###########################
##########################################################################
########################## BASE DE DONNEES ###############################
##########################################################################
##
##
##	Hôte de la base de donnée:
define ('dbhost', '" . $dbhost . "');
##
##
##  Nom de la base de donnée
define ('dbname', '" . $dbname . "');
##
##
##  Utilisateur de la base de donnée
define ('dbuser', '" . $dbuser . "');
##
##
##  Mot de passe de la base de donnée
define ('dbpass', '" . $dbpass . "');
##
##
##########################################################################
############################# APPLICATION ################################
##########################################################################
##
##  Mot de passe pour l'accès a l'application coté étudiants
define('appPass', '" . $appPass . "');
##
##  Mot de passe pour l'accès a l'application coté Administrateurs
define('appAdm', '" . $appAdm . "');
##
##########################################################################
?>";
?>
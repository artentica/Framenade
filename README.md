FRAMENADE
=========

Projet de 3em année, interface de rentré pour des étudiants, 
- Met a disposition des documents
- Permet de récuperer les informations sur les nouveaux élèves


Requis
----

- Serveur apache
- PHP5
- MySQL

Installation
----

### Installation manuelle:
- récuprer le fichier compréssé ici ( pas encore disponnible )
- décompresser le dossier 'site' de l'archive dans votre répertoire www/{{MY_FOLDER}}
- lancer le serveur web apache
```sh
    /etc/init.d/apache2 restart
```
- Acceder à la page 
```sh
    http://localhost/{{MY_FOLDER}}/install 
    //MY_FOLDER correspond a votre dossier d'installation
```
- remplissez les champs demandés
 
### Installation via Git:

```sh
    mkdir /var/www/{{MY_FOLDER}}
    git clone https://github.com/miton18/Framenade.git
    mv -R Framenade/site/ /var/www/{{MY_FOLDER}}/
    rm -R .git
```
Modification de la configuration
----
Editez le fichier de config:
```sh
    nano /var/www/{{MY_FOLDER}}/lib/config.php
```

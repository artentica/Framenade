FRAMENADE
=========

Projet de 3em année, interface de rentré pour des étudiants, 
- Met a disposition des documents
- Permet de récuperer les informations sur les nouveaux élèves


Requis
----

> Serveur apache
> PHP5
> MySQL

Installation
----

##### Installation manuelle:
- récuprer le fichier compréssé ici ( pas encore disponnible )
- décompresser le fichier dans votre répertoire www/
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
##### Installation via Git:

```sh
mkdir /var/www/{{MY_FOLDER}} | cd /var/www/{{MY_FOLDER}}
git clone https://github.com/miton18/Framenade.git
rm -R .git
```


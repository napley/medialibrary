Medialibrary
========================

Medialibrary est un projet basé sur Symfony 3.1

Installation
--------------

  * Cloner le projet

  * Lancer un composer update

  * Créer la base de donnée medialibrary

  * Importer le fichier dump qui se situe dans le projet app/medialibrary.sql

  * Créer un fichier parameter.yml dans app/config avec tous les paramètres nécessaires : 
parameters:
    database_host: 127.0.0.1
    database_port: null
    database_name: medialibrary
    database_user: medialibrary
    database_password: %database_password%
    secret: %secret%

    mailer_transport:  smtp
    mailer_auth_mode:  login
    mailer_host:       %mailer_host%
    mailer_encryption: %mailer_encryption%
    mailer_port:       %mailer_port%
    mailer_user:       %mailer_user%
    mailer_password:   %mailer_password%

 
  * Compte backoffice par défault : admin/admin

  * cache:clear et asset:dump sur les environnements DEV et PROD

NB : Dans l'event listener ArticleAlert.php, les emails d'alertes sont écrasées par une adresse par défault 
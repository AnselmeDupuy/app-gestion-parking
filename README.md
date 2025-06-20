Application de gestion de places de parking, 

Mise en place:

    - Importer le projet: git clone https://github.com/AnselmeDupuy/app-gestion-parking.git

    - Première chose à faire est d'importer la base de donnée du projet, elle se nomme parking_db et est dans le dossier "DataBase" du projet.

    - Ensuite, installer les dépendences grâce à composer en effectuant cette commande en étant dans la racine du projet : composer install


    - Composer crééra un fichier : ".env.dist" qui sers de schéma pour le lien de base de données et d'id client Paypal.

    - Renommer le fichier ".env.dist" en ".env", et complétez les information de la base de données.

    - Important si vous créez un github/gitlab du projet ! Créer un fichier ".gitignore" et y ajouter les fichiers ".env", ".htaccess" et le dossier "Vendor"

La mise en place est fini, connexion et utilisation du site en tant qu'administrateut:

    - Pour se connecter en tant qu'administrateur la première fois:
        - lancer le projet (En localhost ou remote), Cliquer sur "Login"

            - email: admin@mail.com
            - Mot de passe: admin
        
        - Une fois connecté, changer les identifiants administrateur:
            - Aller dans "profile", "Edit Profile", et changer toutes les information (les règles de sécuriter s'appliquerons pour le mot de passe et sa confirmation)

        - Si l'application tourne sur un serveur linux, Dans les fichier allez dans le dossier "includes", et modifier la dernière ligne du fichier "logs.php" qui est commenté, elle permet la création d'un fichier de Log sur le serveur

    - En tant qu'administrateur vous avez accès à:
        - Des logs complets (Logs)
        - Une liste des utilisateur (Users) 
        - Une liste des reservation trié par type (reservations)
        - Une liste des place de parkings (Parkings)
    
Utilisation du site en tant qu'utilisateur:

    - Première fois sur le site, Cliquez sur "Register" dans la barre de navigation en haut, et créé un compte (Email, Nom, Prénom, téléphone et mot de passe d'au moins 12 charactères)

    - Il faudra ensuite aller dans "Profile", et ajouter un vehicule avant de pouvoir réserver

    - Une fois créé, cliquer sur "Login" et se connecter, en tant qu'utilisateur vous avez accès à:

        - Une page de reservation (Reservation)
        - Une page de profile (Profile)
        - Une page de payment des reservation effectué (Order)
        - Un DashBoard comprenant les reservations confirmé (DashBoard)

En tant qu'utilisateur non connecté vous avez accès à:

    - La home page
    - La page d'inscription (Register)
    - La page de connexion (Login)
    - La page de contact (Contact Us) présente dans le pied de page



Documentation Technique:

Choix de la base de donnée:

    - Utilisation d'une base de donnée InnoDB, prenant en charge les clé étrangère.

Architecture:

    - Architecture du projet en MVC (Model, View, Controller)

Technologie utilisé:

    - Utilisation de PHP pour gérer les informations, la base de donnée et les évenement en back-end

    - Utilisation de JavaScript pour un site dynamique et avec peu de rechargement

    - Gestion des paiement par PayPal (par de stockage d'information sensible) avec leur API

    - Intégration direct de BootStrap et FontAwesome pour ne pas dépendre de la disponnibilité de leurs site pour fonctionner

    - CSS et HTML pour l'affichage

    - Fichier ".env" pour un lien vers la base de donnée et le Client_ID PayPal

    - Fichier ".htaccess" pour raccourcir les liens

    - Création d'un fichier de log sur serveur Linux pour la mise en production (Ligne commenté)




tvseries
========

A Symfony project created on January 10, 2017, 3:15 pm.

## Instructions

* Il est nécéssaire d'installer sqlite3 et php ainsi que php-xml et php-sqlite
* Lancer la commande `php bin/console doctrine:database:create`
* Lancer un lite-server `php bin/console server:run`

## Travail réalisé

* Un système de connexion et d'enregistrement à été mis en place.
 * Il respecte les conditions de sécurité
* Des formulaires de créations de séries/épisodes ont été mis en place.
* Un système de pagination toutes les 6 séries à été mis en place.
* Mise en place des bonnes pratiques

## Details divers

* Attention lorsque vous vous enregistrez la première lettre de votre mot de passe est automatiquement convertie en majuscule.
* Pour créer une série nous ne somme pas obligé d'être enregistré.
* Cependant pour ajouter l'information qu'on a vu un épisode (I want to watch it) il est nécéssaire d'être connecté.

tvseries
========

A Symfony project created on January 10, 2017, 3:15 pm.

Authors : Vasilina Frolkova Jean-Frédéric Durand
Description : Projet Symfony aillant pour but de recenser les séries Téléviser à voir/vu


## Instructions

* Il est nécéssaire d'installer sqlite3, php ainsi que php-xml et php-sqlite
* Lancer la commande `php bin/console doctrine:database:create`
* Lancer un lite-server `php bin/console server:run`

## Travail réalisé

* Un système de connexion et d'enregistrement à été mis en place.
 * Il respecte les conditions de sécurité
* Des formulaires de créations de séries/épisodes ont été mis en place.
* Un système de pagination toutes les 6 séries à été mis en place.
* Mise en place des bonnes pratiques

## Details divers

* /!\ Attention lorsque vous vous enregistrez la première lettre de votre mot de passe est automatiquement convertie en majuscule.
* Pour créer une série nous ne sommes pas obligé d'être enregistré, cependant le bouton est caché si nous ne sommes pas connecté.
* Pour ajouter l'information qu'un épisode veut être vu (I want to watch it) il est nécéssaire d'être connecté.

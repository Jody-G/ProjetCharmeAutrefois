### ProjetCharmeAutrefois

Projet ayant pour but créer un site personnel pour une cliente, lui permettant de partager ses réalisations.

## Technologies utilisées

* Trello
* Lucid
* PHP 7.4
* MySQL
* Composer
* Symfony CLI
* Docker
* Docker-compose
* Mailer

## Lancement du projet

* composer install
* docker-compose up -d
* yarn install
* yarn encore dev --watch
* symfony server:start -d

## Mise à jour de la base de données + Fixtures

* commande personnalisé: "composer SuperDFL" (voir dans composer.json)

## Lancement des tests

* "php bin/phpunit --testdox"

## Envoi d'email avec Mailer

* "symfony console app:send-contact"

## Identifiants login (provisoire)

* Email: admin@test.com
* Pass: password

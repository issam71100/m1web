# m1web

## Principales commandes

### Commandes générales

`symfony check:req` : vérifier les exigences d'un projet Symfony

`symfony server:ca:install` : créer un certificat local pour bénéficier du https

`symfony new <DOSSIER>` : créer un nouveau projet Symfony

`symfony console` : lister toutes les commandes

`symfony serve` : lancer le serveur PHP

### Commandes de référence

`symfony console debug:router` : lister les routes

`symfony console debug:twig` : lister les fonctions, filtres et variables globales de Twig

### Commandes de création de modèles

`symfony console make:twig-extension` : créer une extension Twig

## Principaux composants

`composer require <COMPOSANT>` : installer un composant ou une dépendance

`annot` : utiliser les annotations

`twig` : utiliser le moteur de template [Twig](https://twig.symfony.com/)

`debug` : gérer le débogage

`asset` : utiliser des ressources externes dans Twig

`make` : créer des modèles de classes PHP

## Références

Documentation : <https://symfony.com/doc/current/index.html>

## Plan de cours

* Installation de Symfony CLI

* Pré-requis à la création d'un projet Symfony

	* Vérifier les exigences d'un projet Symfony

	* Créer un certificat local

* Création d'un projet Symfony

* Création du premier contrôleur

	* Request et Response

	* Afficher une vue Twig

* Gestion des routes

	* Créer une route avec des annotations

	* Créer une route avec un paramètre

* Twig

	* Principaux fonctions et filtres

	* Créer une extension Twig

	* Créer des variables globales

	* Gérer la mise en page
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

`symfony console make:form` : créer une classe de formulaire

## Principaux composants

`composer require <COMPOSANT>` : installer un composant ou une dépendance

`annot` : utiliser les annotations

`twig` : utiliser le moteur de template [Twig](https://twig.symfony.com/)

`debug` : gérer le débogage

`asset` : utiliser des ressources externes dans Twig

`make` : créer des modèles de classes PHP

`encore` : utiliser webpack pour gérer les fichiers JS et CSS

`form` : créer des formulaires

`validator` : créer des contraintes de validation sur les champs de formulaires

`mailer` : gérer les emails

## Références

Documentation : <https://symfony.com/doc/current/index.html>

Champs de formulaire : <https://symfony.com/doc/current/reference/forms/types.html>

Contraintes de validation sur les champs de formulaire  : <https://symfony.com/doc/current/reference/constraints.html>

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

* Gérer les fichiers JS et CSS

	* Utilisation du composant Encore

	* Installation de Bootstrap et jQuery

* Gérer les formulaires

	* Créer une classe de formulaire

	* Gérer les champs de formulaire

	* Gérer les contraintes de validation des champs de formulaire

	* Gérer un formulaire dans un contrôleur

	* Fonctions Twig liées aux formulaires

* Gérer les emails

	* Utilisation du composant Mailer

	* Créer un email au format texte et HTML
<?php

// namespace
// App provient de composer.json
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
	/*
	 *  annotation Route permet de définir une route (URL)
	 *     - schéma de la route : URL
	 *     - nom unique de la route
	 *          nomenclature recommandée : <nom du contrôleur>.<nom de la méthode>
	 *  dans les annotations, utiliser uniquement des doubles guillemets
	 */

	/**
	 * @Route("/", name="homepage.index")
	 */
	public function index():Response
	{
		// retour de la réponse HTTP
		return new Response('coucou');
	}
}
<?php

// namespace
// App provient de composer.json
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
	public function index(Request $request):Response
	{
		/*
		 * débogage avec le composant debug
		 *  dump : affichage dans la barre de débogage
		 *  dd : dump and die
		*/
		//dd($request->server->get('HTTP_USER_AGENT'));

		// retour de la réponse HTTP
		/*return new Response('{ "data" : [ { "content" : "value" } ] }', Response::HTTP_FORBIDDEN, [
			'Content-Type' => 'application/json'
		]);*/

		/*
		 * retour d'une vue twig
		 *   les vues sont à stocker dans le dossier templates
		 *   à la racine du dossier, sont stockées les pages parentes
		 *   dans les dossiers, sont stockées les pages enfants
		 * architecture recommandée
		 *   dans le dossier templates :
		 *      - créer un dossier du même nom que le contrôleur
		 *      - la vue reprend le nom de la méthode
		 *   render cible automatiquement le dossier templates
		 */

		$userAgent = $request->server->get('HTTP_USER_AGENT');

		/*
		 * pour envoyer des informations à la vue, utiliser le second paramètre de render sous forme de tableau associatif
		 * dans la vue, c'est la clé qui est récupérée
		 */
		return $this->render('homepage/index.html.twig', [
			'param' => $userAgent
		]);
	}

	/*
	 * paramètre dans la route
	 *    dans le schéma de la route, utiliser des accolades
	 *       en PHP pur : page.php?firstname=tutu
	 *    les paramètres de la route se retrouvent obligatoirement en paramètres de la méthode
	 *
	 * méthodes HTTP acceptées par la route : paramètre methods
	 */

	/**
	 * @Route("/hello/{firstname}-{lastname}", name="homepage.hello", methods={"GET", "PUT"})
	 */
	public function hello(?string $firstname = null, ?string $lastname = null):Response
	{
		return $this->render('homepage/hello.html.twig', [
			'firstname' => $firstname,
			'lastname' => $lastname
		]);
	}

	/**
	 * @Route("/twig", name="homepage.twig")
	 */
	public function twig():Response
	{
		$list = [
			'key0' => 'value0',
			'key1' => 'value1',
			'key2' => 'value2',
		];

		return $this->render('homepage/twig.html.twig', [
			'list' => $list,
			'now' => new \DateTime(),
			'price' => 50990.75
		]);
	}
}









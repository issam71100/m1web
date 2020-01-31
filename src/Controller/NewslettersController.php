<?php

namespace App\Controller;

use App\Form\Model\NewslettersFormModel;
use App\Form\NewslettersType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class NewslettersController extends AbstractController
{
	/**
	 * @Route("/newsletters-subscription", name="newsletters.index")
	 */
	public function index(Request $request):Response
	{
		// affichage du formulaire
		$type = NewslettersType::class;
		$model = new NewslettersFormModel();
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);

		// si le formulaire est valide
		if($form->isSubmitted() && $form->isValid()){
			// création d'un fichier CSV
			$headers = !file_exists('csv/newsletters-subscriptions.csv') ? "Email,Abonnements\r\n" : null;
			$line = "{$model->getEmail()}," . implode(' / ', $model->getSubscriptions()) . "\r\n";
			file_put_contents('csv/newsletters-subscriptions.csv', $headers.$line, FILE_APPEND);

			// message flash : message stocké en session et affiché une seule fois
			$this->addFlash('notice', "Vos abonnements ont été enregistrés");

			// redirection vers une route par son nom
			return $this->redirectToRoute('homepage.index');
		}

		return $this->render('newsletters/index.html.twig', [
			'form' => $form->createView()
		]);
	}
}








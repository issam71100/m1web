<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Form\Model\ContactFormModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
	/**
	 * @Route("/contact", name="contact.index")
	 */
	public function index(Request $request):Response
	{
		/*
		 * affichage d'un formulaire
		 *   se base
		 *      - sur l'espace de noms de la classe de formulaire
		 *      - sur une instance du modèle relié à la classe de formulaire
		 *  handleRequest permet de récupérer la saisie dans la requête HTTP
		 *  createView permet d'envoyer le formulaire sous forme de vue
		 */
		$type = ContactType::class;
		$model = new ContactFormModel();
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);

		return $this->render('contact/index.html.twig', [
			'form' => $form->createView()
		]);
	}
}








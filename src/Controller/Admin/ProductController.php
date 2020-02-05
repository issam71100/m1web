<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class ProductController extends AbstractController
{
	/**
	 * @Route("/products", name="admin.product.index")
	 */
	public function index(ProductRepository $productRepository):Response
	{
		$results = $productRepository->findAll();

		return $this->render('admin/product/index.html.twig', [
			'results' => $results
		]);
	}

	/**
	 * @Route("/products/form", name="admin.product.form")
	 */
	public function form(Request $request, EntityManagerInterface $entityManager):Response
	{
		// affichage d'un formulaire
		$type = ProductType::class;
		$model = new Product();
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);

		// si le formulaire est valide
		if($form->isSubmitted() && $form->isValid()){
			//dd($model);
			/*
			 * insertion dans une table
			 * EntityManagerInterface permet d'exécuter UPDATE, DELETE, INSERT
			 *   méthode persist permet un INSERT
			 *   méthode flush permet d'exécuter les requêtes
			 */
			$entityManager->persist($model);
			$entityManager->flush();

			// message de confirmation
			$message = "Le produit a été ajouté";
			$this->addFlash('notice', $message);

			// redirection
			return $this->redirectToRoute('admin.product.index');
		}

		return $this->render('admin/product/form.html.twig', [
			'form' => $form->createView()
		]);
	}
}









<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
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
	public function form(Request $request):Response
	{
		// affichage d'un formulaire
		$type = ProductType::class;
		$model = new Product();
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);

		// si le formulaire est valide
		if($form->isSubmitted() && $form->isValid()){
			dd($model);
		}

		return $this->render('admin/product/form.html.twig', [
			'form' => $form->createView()
		]);
	}
}









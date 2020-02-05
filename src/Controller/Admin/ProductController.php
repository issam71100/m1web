<?php

namespace App\Controller\Admin;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
	public function form():Response
	{
		return $this->render('admin/product/form.html.twig');
	}
}









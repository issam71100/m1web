<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
	/**
	 * @Route("/products", name="product.index")
	 */
	public function index(ProductRepository $productRepository):Response
	{
		/*
		 * doctrine
		 *      entité :
		 *          objet réprésentant un enregistrement d'une table
		 *          objet réprésentant une table de la base
		 *      deux branches
		 *          EntityManager : INSERT , DELETE, UPDATE
		 *          Repository : SELECT
		 *              findAll : sélection de tous les enregistrements
		 *                  SELECT * FROM
		 *              find : sélection d'un enregistrement par son id
		 *                   SELECT * FROM WHERE id=
		 *              findBy : sélection de plusieurs enregistrements avec une condition sur les propriétés de l'entité
		 *                  SELECT * FROM WHERE col= ORDER BY OFFSET LIMIT
		 *              findOneBy : sélection d'un enregistrement avec des conditions
		 */
		$results = $productRepository->findAll();

		return $this->render('product/index.html.twig', [
			'results' => $results
		]);
	}

	/**
	 * @Route("/product/{id}", name="product.details")
	 */
	public function details(int $id, ProductRepository $productRepository):Response
	{
		$product = $productRepository->find($id);
		return $this->render('product/details.html.twig', [
			'product' => $product
		]);
	}

}









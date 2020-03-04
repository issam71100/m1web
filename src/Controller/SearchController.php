<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends AbstractController
{
	/**
	 * @Route("/search", name="search.index")
	 */
	public function index(Request $request, ProductRepository $productRepository):Response
	{
		/*
		 * récupération des données
		 *      en POST : $request->request
		 *      en GET : $request->query
		 */
		$searchTerm = $request->request->get('search');
		$searchResults = $productRepository->searchByTerm($searchTerm)->getResult();

		return $this->render('search/index.html.twig', [
			'searchResults' => $searchResults
		]);
	}
}








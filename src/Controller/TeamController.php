<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends AbstractController
{
	// php 7.4 uniquement : typage des propriétés
	private array $list = [
		[ 'firstname' => 'jean', 'lastname' => 'claude', 'email' => 'jean@claude.com', 'photo' => '1.jpg' ],
		[ 'firstname' => 'luc', 'lastname' => 'matthieu', 'email' => 'luc@matthieu.com', 'photo' => '2.jpg' ],
		[ 'firstname' => 'rémi', 'lastname' => 'damien', 'email' => 'remi@damien.com', 'photo' => '3.jpg' ]
	];

	/**
	 * @Route("/team", name="team.index")
	 */
	public function index():Response
	{
		return $this->render('team/index.html.twig', [
			'list' => $this->list
		]);
	}

	/**
	 * @Route("/team/{firstname}-{lastname}", name="team.details")
	 */
	public function details(string $firstname , string $lastname):Response
	{
		/*
		 * array_values : récupérer la valeur de chaque entré du tableau
		 * array_filter : créer un nouveau tableau selon les conditions du filtrage
		 *     member récupère chaque entrée du tableau
		 */
		$result = array_values(
			array_filter($this->list, function($member) use($firstname, $lastname) {
				// les informations de l'entrée du tableau doivent correspondre aux variables d'URL
				if($member['firstname'] === $firstname && $member['lastname'] === $lastname){
					return $member;
				}
			})
		);

		//dd($firstname, $lastname, $result);
		return $this->render('team/details.html.twig', [
			'result' => $result[0]
		]);
	}
}








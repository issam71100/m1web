<?php

namespace App\Form\Model;

class NewslettersFormModel
{
	private $email = null;
	private $list = [
		'Nouveaux produits' => 'newProducts',
		'Actualités' => 'news',
		'Quotidienne' => 'daily'
	];
	private $subscriptions = [];

	// getters / setters
	public function setEmail(?string $email):void { $this->email = $email; }
	public function setList(?array $list):void { $this->list = $list; }
	public function setSubscriptions(?array $subscriptions):void { $this->subscriptions = $subscriptions; }

	public function getEmail():?string { return $this->email; }
	public function getList():?array { return $this->list; }
	public function getSubscriptions():?array { return $this->subscriptions; }
}










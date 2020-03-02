<?php

namespace App\EventSubscriber\Form;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ProductFormSubscriber implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		/*
		 * évenements de formulaire: permet de moduler un formulaire (champs, contraintes)
		 *      PRE_SET_DATA : avant l'initialisation du formulaire, les données du formulaire ne sont reliées à un modèle
		 *      POST_SET_DATA : avant l'initialisation du formulaire, les données du formulaire sont reliées à un modèle
		 *      PRE_SUBMIT : avant la soumission
		 *      SUBMIT : lors de la soumission
		 *      POST_SUBMIT : après la soumission
		 */
		return [
			FormEvents::POST_SET_DATA => 'postSetData'
		];
	}

	public function postSetData(FormEvent $event):void
	{
		/*
		 * getData : données initiales du formulaire avant la soumission
		 * getForm : classe de formulaire
		 * getForm()->getData() : données du formulaire après la soumission
		 */
		$data = $event->getData();
		$form = $event->getForm();
		$model = $form->getData();

		dd($data, $form, $model);
	}
}





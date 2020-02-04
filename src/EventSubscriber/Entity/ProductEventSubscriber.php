<?php

namespace App\EventSubscriber\Entity;

/*
 * souscripteur d'entités doctrine
 *    déclencher des actions durant le cycle de vie d'une entité
 *
 */

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;

class ProductEventSubscriber implements EventSubscriber
{
	/*
	 * getSubscribedEvents doit retourner un array des événements à écouter
	 * principaux événements:
	 *      - postLoad : après le chargement d'une entité
	 *      - prePersist / postPersist : avant ou après la création d'une nouvelle entité dans la table (INSERT)
	 *      - preUpdate / postUpdate : avant ou après la mise à jour d'une entité dans la table (UPDATE)
	 *      - preRemove / postRemove : avant ou après la suppression d'une entité dans la table (DELETE)
	 *
	 * 
	 */
	public function getSubscribedEvents()
	{
		return [
			Events::postPersist,
			//Events::postUpdate
		];
	}
}








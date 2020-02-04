<?php

namespace App\EventSubscriber\Entity;

/*
 * souscripteur d'entités doctrine
 *    déclencher des actions durant le cycle de vie d'une entité
 *
 */

use App\Entity\Product;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProductEventSubscriber implements EventSubscriber
{
	/*
	 * injecter un service dans un service non contrôleur
	 *      créer une propriété
	 *      créer un constructeur avec un paramètre réprésentant le service
	 *      dans le constructeur, lier la propriété et le paramètre
	 */
	private $slugger;

	public function __construct(SluggerInterface $slugger)
	{
		$this->slugger = $slugger;
	}

	public function prePersist(LifecycleEventArgs $event):void
	{
		// par défaut, les souscripteurs doctrine écoutent toutes les entités
		if($event->getObject() instanceof Product){
			$product = $event->getObject();
			$product->setSlug( $this->slugger->slug($product->getName())->lower() );
		}
	}

	/*
	 * getSubscribedEvents doit retourner un array des événements à écouter
	 * principaux événements:
	 *      - postLoad : après le chargement d'une entité
	 *      - prePersist / postPersist : avant ou après la création d'une nouvelle entité dans la table (INSERT)
	 *      - preUpdate / postUpdate : avant ou après la mise à jour d'une entité dans la table (UPDATE)
	 *      - preRemove / postRemove : avant ou après la suppression d'une entité dans la table (DELETE)
	 *
	 * le nom des méthodes gérant les événements doivent reprendre strictement le nom de l'événement
	 *
	 * NE PAS OUBLIER de déclarer le souscripteur doctrine dans config/services.yaml
	 */
	public function getSubscribedEvents()
	{
		return [
			Events::prePersist,
			//Events::postUpdate
		];
	}
}








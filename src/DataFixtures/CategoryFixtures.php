<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$faker = Faker::create();
    	// création de plusieurs catégories
	    for($i = 0; $i < 5; $i++) {
	    	// instanciation d'une entité
		    $category = new Category();



		    // doctrine : méthode persist permet de créer un enregistrement (INSERT INTO)
		    $manager->persist($category);
	    }

	    // doctrine : méthode flush permet d'exécuter les requêtes SQL (à exécuter une seule fois)
        $manager->flush();
    }
}

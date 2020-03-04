<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /*
     * DQL : Doctrine Query Language
     *  createQueryBuilder : création d'une requête DQL
     *     en paramètre : création d'un alias de l'entité
     *  select : sélectionner les propriétés de l'entité à afficher
     *  where : première condition / utilisation de paramètres de requête
     *  andWhere : autre condition
     *  join : jointure
     *      cibler une propriété relationnelle de l'entité
     *      création d'un alias de l'entité en relation
     *  setParameters : permet de donner une valeur aux paramètres de la requête
     *  setMaxResults : LIMIT, limitation du nombre de résultats
     *  setFirstResult : OFFSET, décalage des résultats
     *  groupBy : regroupement de résultats
     *  getQuery : obligatoirement en dernière instruction
     *
     */
	public function test():Query
	{
		$results = $this->createQueryBuilder('product')
			->select('COUNT(product.id), category.name')
			->join('product.category', 'category')
			->groupBy('category.name')

			/*->select('product.name, product.price, category.name AS cName')
			->join('product.category', 'category')
			->where('product.price > :price')
			->andWhere('product.name LIKE :name')
			->setMaxResults(3)
			->setFirstResult(3)
			->setParameters([
				'price' => 500,
				'name' => 'a%'
			])*/
			->getQuery()
		;

		// retour des résultats
		return $results;
    }

	public function searchByTerm(string $searchTerm):Query
	{
		$query = $this->createQueryBuilder('product')
			->select('product.id, product.name, product.slug')
			->where('product.name LIKE :searchTerm')
			->setParameters([
				'searchTerm' => "%$searchTerm%"
			])
			->getQuery()
		;
		return $query;
    }




    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

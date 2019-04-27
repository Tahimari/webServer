<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Item::class);
    }

    /**
     * @return Item[]
     */
    public function findAllTitleAlphabetical()
    {
        return $this->createQueryBuilder('u')
                ->orderBy('u.title', 'ASC')
                ->getQuery()
                ->execute();
    }

    public function findAllVisible()
    {
        return $this->createQueryBuilder('u')
                ->andWhere('u.isVisible=1')
                ->orderBy('u.createdAt', 'DESC')
                ->getQuery()
                ->execute();
    }

    public function findAllOrderByDate()
    {
        return $this->createQueryBuilder('u')
                ->orderBy('u.createdAt', 'DESC')
                ->getQuery()
                ->execute();
    }

    /**
     * @return User[]
     */
    public function findAllMatching(string $query, int $limit = 5)
    {
        return $this->createQueryBuilder('u')
                ->andWhere('u.isVisible=1')
                ->andWhere('u.title LIKE :query')
                ->orderBy('u.createdAt', 'DESC')
                ->setParameter('query', '%' . $query . '%')
                ->setMaxResults($limit)
                ->getQuery()
                ->getResult();
    }

    /**
     * @return User[]
     */
    public function findByCategoryOrderByDate(string $category)
    {
        return $this->createQueryBuilder('u')
                ->andWhere('u.isVisible=1')
                ->andWhere('u.category LIKE :category')
                ->orderBy('u.createdAt', 'DESC')
                ->setParameter('category', '%' . $category . '%')
                ->getQuery()
                ->getResult();
    }
    
    // /**
    //  * @return Item[] Returns an array of Item objects
    //  */
    /*
      public function findByExampleField($value)
      {
      return $this->createQueryBuilder('i')
      ->andWhere('i.exampleField = :val')
      ->setParameter('val', $value)
      ->orderBy('i.id', 'ASC')
      ->setMaxResults(10)
      ->getQuery()
      ->getResult()
      ;
      }
     */

    /*
      public function findOneBySomeField($value): ?Item
      {
      return $this->createQueryBuilder('i')
      ->andWhere('i.exampleField = :val')
      ->setParameter('val', $value)
      ->getQuery()
      ->getOneOrNullResult()
      ;
      }
     */
}

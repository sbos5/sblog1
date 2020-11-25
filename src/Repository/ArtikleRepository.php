<?php

namespace App\Repository;

use App\Entity\Artikle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Artikle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artikle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artikle[]    findAll()
 * @method Artikle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtikleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artikle::class);
    }

    // /**
    //  * @return Artikle[] Returns an array of Artikle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Artikle
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

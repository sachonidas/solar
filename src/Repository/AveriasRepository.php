<?php

namespace App\Repository;

use App\Entity\Averias;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Averias|null find($id, $lockMode = null, $lockVersion = null)
 * @method Averias|null findOneBy(array $criteria, array $orderBy = null)
 * @method Averias[]    findAll()
 * @method Averias[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AveriasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Averias::class);
    }

    // /**
    //  * @return Averias[] Returns an array of Averias objects
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
    public function findOneBySomeField($value): ?Averias
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

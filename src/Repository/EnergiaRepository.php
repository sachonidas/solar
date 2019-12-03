<?php

namespace App\Repository;

use App\Entity\Energia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Energia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Energia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Energia[]    findAll()
 * @method Energia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnergiaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Energia::class);
    }

    // /**
    //  * @return Energia[] Returns an array of Energia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Energia
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

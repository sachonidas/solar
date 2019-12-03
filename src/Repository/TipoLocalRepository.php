<?php

namespace App\Repository;

use App\Entity\TipoLocal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TipoLocal|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoLocal|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoLocal[]    findAll()
 * @method TipoLocal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoLocalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoLocal::class);
    }

    // /**
    //  * @return TipoLocal[] Returns an array of TipoLocal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoLocal
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

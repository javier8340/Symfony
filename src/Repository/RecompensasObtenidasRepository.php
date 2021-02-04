<?php

namespace App\Repository;

use App\Entity\RecompensasObtenidas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecompensasObtenidas|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecompensasObtenidas|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecompensasObtenidas[]    findAll()
 * @method RecompensasObtenidas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecompensasObtenidasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecompensasObtenidas::class);
    }

    // /**
    //  * @return RecompensasObtenidas[] Returns an array of RecompensasObtenidas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecompensasObtenidas
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

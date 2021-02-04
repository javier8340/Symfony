<?php

namespace App\Repository;

use App\Entity\Recompensa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Recompensa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recompensa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recompensa[]    findAll()
 * @method Recompensa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecompensaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recompensa::class);
    }

    // /**
    //  * @return Recompensa[] Returns an array of Recompensa objects
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
    public function findOneBySomeField($value): ?Recompensa
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

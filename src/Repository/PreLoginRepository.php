<?php

namespace App\Repository;

use App\Entity\PreLogin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PreLogin|null find($id, $lockMode = null, $lockVersion = null)
 * @method PreLogin|null findOneBy(array $criteria, array $orderBy = null)
 * @method PreLogin[]    findAll()
 * @method PreLogin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreLoginRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PreLogin::class);
    }

    // /**
    //  * @return PreLogin[] Returns an array of PreLogin objects
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
    public function findOneBySomeField($value): ?PreLogin
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

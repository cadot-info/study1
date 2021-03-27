<?php

namespace App\Repository;

use App\Entity\Avancee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Avancee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avancee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avancee[]    findAll()
 * @method Avancee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvanceeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avancee::class);
    }

    // /**
    //  * @return Avancee[] Returns an array of Avancee objects
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
    public function findOneBySomeField($value): ?Avancee
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

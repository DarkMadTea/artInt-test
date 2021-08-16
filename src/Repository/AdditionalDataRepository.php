<?php

namespace App\Repository;

use App\Entity\AdditionalData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdditionalData|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdditionalData|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdditionalData[]    findAll()
 * @method AdditionalData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdditionalDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdditionalData::class);
    }

    // /**
    //  * @return AdditionalData[] Returns an array of AdditionalData objects
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
    public function findOneBySomeField($value): ?AdditionalData
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

<?php

namespace App\Repository;

use App\Entity\Avispas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Avispas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avispas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avispas[]    findAll()
 * @method Avispas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvispasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Avispas::class);
    }

    // /**
    //  * @return Avispas[] Returns an array of Avispas objects
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
    public function findOneBySomeField($value): ?Avispas
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

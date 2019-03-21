<?php

namespace App\Repository;

use App\Entity\Continente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Continente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Continente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Continente[]    findAll()
 * @method Continente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContinenteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Continente::class);
    }

    // /**
    //  * @return Continente[] Returns an array of Continente objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Continente
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

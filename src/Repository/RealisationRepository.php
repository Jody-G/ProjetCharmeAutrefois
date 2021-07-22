<?php

namespace App\Repository;

use App\Entity\Categorie;
use App\Entity\Realisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Realisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Realisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Realisation[]    findAll()
 * @method Realisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RealisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Realisation::class);
    }

    /**
     * @return Realisation[] Returns an array of Realisation objects
     */
    public function findThree()
    {
        return $this->createQueryBuilder('r')
            ->orderBy('r.id', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Realisation[] Returns an array of Peinture objects
     */
    public function findAllRealisation(Categorie $categorie): array
    {
        return $this->createQueryBuilder('r')
        ->where(':categorie MEMBER OF r.categorie')
        ->setParameter('categorie', $categorie)
        ->getQuery()
        ->getResult()
        ;
    }

    // /**
    //  * @return Realisation[] Returns an array of Realisation objects
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
    public function findOneBySomeField($value): ?Realisation
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

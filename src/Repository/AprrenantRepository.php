<?php

namespace App\Repository;

use App\Entity\Aprrenant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Aprrenant>
 *
 * @method Aprrenant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aprrenant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aprrenant[]    findAll()
 * @method Aprrenant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AprrenantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aprrenant::class);
    }

//    /**
//     * @return Aprrenant[] Returns an array of Aprrenant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Aprrenant
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

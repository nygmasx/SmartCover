<?php

namespace App\Repository;

use App\Entity\LetterContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LetterContent>
 *
 * @method LetterContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method LetterContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method LetterContent[]    findAll()
 * @method LetterContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LetterContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LetterContent::class);
    }

//    /**
//     * @return LetterContent[] Returns an array of LetterContent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LetterContent
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

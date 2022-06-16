<?php

namespace App\Repository;

use App\Entity\ValeurCaracteristique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ValeurCaracteristique>
 *
 * @method ValeurCaracteristique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValeurCaracteristique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValeurCaracteristique[]    findAll()
 * @method ValeurCaracteristique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValeurCaracteristiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValeurCaracteristique::class);
    }

    public function add(ValeurCaracteristique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ValeurCaracteristique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ValeurCaracteristique[] Returns an array of ValeurCaracteristique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ValeurCaracteristique
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

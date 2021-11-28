<?php

namespace App\Repository;

use App\Entity\Operation;
use App\Entity\Transaction;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Transaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Transaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Transaction[]    findAll()
 * @method Transaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }


    /**
     * retourne nbr de transaction par annee
     * @return array
     */

    public function countByDate(){
        $query= $this->createQueryBuilder('a')
        ->select(['SUBSTRING(a.createdAt,15,2) as min ,COUNT(a) as nbr'])
        ->groupBy('min');
        return $query->getQuery()-> getResult();

    }
    /**
     * retourne nbr de type par annee
     * @return array
     */

    public function countTransaction(){
        $query= $this->createQueryBuilder('t')
        ->select(['COUNT(t) as nbr , u.type as type'])
        ->leftJoin('t.operation',
        'u',
        \Doctrine\ORM\Query\Expr\Join::WITH,
        't.operation = u.id')
        ->groupBy('type');
        
        return $query->getQuery()->getResult();
       
    }

    // /**
    //  * @return Transaction[] Returns an array of Transaction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Transaction
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

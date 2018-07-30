<?php
/**
 * Created by PhpStorm.
 * User: Piotr_Wanio
 * Date: 29.07.2018
 * Time: 12:00
 */

namespace App\Repository;
use Doctrine\ORM\EntityRepository;

class ArticlesRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        $qb = $this->createQueryBuilder("p")->select("p", "r")
            ->orderBy('p.artTitle', 'ASC')
            ->leftJoin('p.artGal', 'r')
            ->getQuery();
        return $qb->getArrayResult();
    }
}
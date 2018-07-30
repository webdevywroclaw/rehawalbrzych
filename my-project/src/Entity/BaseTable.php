<?php

namespace App\Entity;

class BaseTable
{
    protected $em;
    protected $qb;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->qb = $this->em->createQueryBuilder();
    }
}

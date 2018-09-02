<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class PhotosRepository extends EntityRepository
{
    public function findAllFromGallery($galId)
    {
        $qb = $this->createQueryBuilder('p')->select('p')
            ->where('p.galleryGal = '.$galId)
            ->getQuery();
        return $qb->getArrayResult();
    }

}
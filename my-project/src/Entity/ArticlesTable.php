<?php
/**
 * Created by PhpStorm.
 * User: Piotr_Wanio
 * Date: 27.07.2018
 * Time: 00:58
 */

namespace App\Entity;

class ArticlesTable extends BaseTable
{
    public function getArticles(array $options = [])
    {
        $q = $this->qb->select('art', 'cat.catName')
            ->from('Api\Model\Articles', 'art')
            ->leftJoin('art.artCat', 'cat');
        if(isset($options['categoryId'])) {
            $q->where('cat.catId = :catId')
                ->setParameter('catId', $options['categoryId']);
        }
        return $q->getQuery()->getArrayResult();
    }
    public function getArticle($id)
    {
        $q = $this->qb->select('art')
            ->from('Api\Model\Articles', 'art')
            ->where('art.artId = :artId')
            ->setParameter('artId', $id);
        return $q->getQuery()->getArrayResult();
    }
}
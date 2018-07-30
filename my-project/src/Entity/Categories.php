<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories", uniqueConstraints={@ORM\UniqueConstraint(name="cat_slug_UNIQUE", columns={"cat_slug"})})
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var int
     *
     * @ORM\Column(name="cat_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $catId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cat_name", type="string", length=255, nullable=true)
     */
    private $catName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cat_slug", type="string", length=255, nullable=true)
     */
    private $catSlug;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="cat_status", type="boolean", nullable=true)
     */
    private $catStatus;


}

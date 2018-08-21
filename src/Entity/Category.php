<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Category
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
     * @var Photo
     *
     * @ORM\ManyToOne(targetEntity="Photo",  cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cat_photo_id", referencedColumnName="photo_id")
     * })
     */
    private $photoId;

    /**
     * @return Photo
     */
    public function getPhotoId(): Photo
    {
        return $this->photoId;
    }

    /**
     * @param Photo $photoId
     */
    public function setPhotoId(Photo $photoId): void
    {
        $this->photoId = $photoId;
    }

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * @param int $catId
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    /**
     * @return null|string
     */
    public function getCatName(): ?string
    {
        return $this->catName;
    }

    /**
     * @param null|string $catName
     */
    public function setCatName(?string $catName): void
    {
        $this->catName = $catName;
    }


}

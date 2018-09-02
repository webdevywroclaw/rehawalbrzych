<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Method
 *
 * @ORM\Table(name="method", indexes={@ORM\Index(name="fk_method_category1_idx", columns={"category_cat_id"}), @ORM\Index(name="fk_method_gallery1_idx", columns={"gallery_gal_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\MethodsRepository")
 */
class Method
{
    /**
     * @var int
     *
     * @ORM\Column(name="met_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $metId;
//
//    /**
//     * @var int
//     *
//     * @ORM\Column(name="met_cat_id", type="integer", nullable=false)
//     * @ORM\Id
//     * @ORM\GeneratedValue(strategy="NONE")
//     */
//    private $metCatId;
//
//    /**
//     * @var int
//     *
//     * @ORM\Column(name="met_gal_id", type="integer", nullable=false)
//     * @ORM\Id
//     * @ORM\GeneratedValue(strategy="NONE")
//     */
//    private $metGalId;

    /**
     * @var string
     *
     * @ORM\Column(name="met_name", type="string", length=45, nullable=false)
     */
    private $metName;

    /**
     * @var string
     *
     * @ORM\Column(name="met_body", type="string", length=45, nullable=false)
     */
    private $metBody;

    /**
     * @var int
     *
     * @ORM\Column(name="met_price", type="integer", length=11, nullable=true)
     */
    private $metPrice;

    /**
     * @return int
     */
    public function getMetId(): int
    {
        return $this->metId;
    }

    /**
     * @param int $metId
     */
    public function setMetId(int $metId): void
    {
        $this->metId = $metId;
    }

    /**
     * @return int
     */
    public function getMetCatId(): int
    {
        return $this->metCatId;
    }

    /**
     * @param int $metCatId
     */
    public function setMetCatId(int $metCatId): void
    {
        $this->metCatId = $metCatId;
    }

    /**
     * @return int
     */
    public function getMetGalId(): int
    {
        return $this->metGalId;
    }

    /**
     * @param int $metGalId
     */
    public function setMetGalId(int $metGalId): void
    {
        $this->metGalId = $metGalId;
    }

    /**
     * @return string
     */
    public function getMetName(): string
    {
        return $this->metName;
    }

    /**
     * @param string $metName
     */
    public function setMetName(string $metName): void
    {
        $this->metName = $metName;
    }

    /**
     * @return string
     */
    public function getMetBody(): string
    {
        return $this->metBody;
    }

    /**
     * @param string $metBody
     */
    public function setMetBody(string $metBody): void
    {
        $this->metBody = $metBody;
    }

    /**
     * @return int
     */
    public function getMetPrice(): int
    {
        return $this->metPrice;
    }

    /**
     * @param int $metPrice
     */
    public function setMetPrice(int $metPrice): void
    {
        $this->metPrice = $metPrice;
    }



    /**
     * @return Category
     */
    public function getCategoryCat(): Category
    {
        return $this->categoryCat;
    }

    /**
     * @param Category $categoryCat
     */
    public function setCategoryCat(Category $categoryCat): void
    {
        $this->categoryCat = $categoryCat;
    }

    /**
     * @return Gallery
     */
    public function getGalleryGal(): Gallery
    {
        return $this->galleryGal;
    }

    /**
     * @param Gallery $galleryGal
     */
    public function setGalleryGal(Gallery $galleryGal): void
    {
        $this->galleryGal = $galleryGal;
    }

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_cat_id", referencedColumnName="cat_id")
     * })
     */
    private $categoryCat;

    /**
     * @var Gallery
     *
     * @ORM\ManyToOne(targetEntity="Gallery")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gallery_gal_id", referencedColumnName="gal_id")
     * })
     */
    private $galleryGal;


}

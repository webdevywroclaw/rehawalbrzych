<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="fk_article_gallery1_idx", columns={"gallery_gal_id"}), @ORM\Index(name="fk_article_category1_idx", columns={"category_cat_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="art_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $artId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="art_title", type="string", length=45, nullable=true)
     */
    private $artTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="art_body", type="string", length=45, nullable=true)
     */
    private $artBody;

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
     *   @ORM\JoinColumn(name="gallery_gal_id", referencedColumnName="gal_id", nullable=true)
     * })
     */
    private $galleryGal;

    /**
     * @var Therapeutist
     *
     * @ORM\ManyToOne(targetEntity="Therapeutist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="art_author", referencedColumnName="therap_id", nullable=true)
     * })
     */
    private $artAuthor;

    /**
     * @return int
     */
    public function getArtId(): int
    {
        return $this->artId;
    }

    /**
     * @param int $artId
     */
    public function setArtId(int $artId): void
    {
        $this->artId = $artId;
    }

    /**
     * @return null|string
     */
    public function getArtTitle(): ?string
    {
        return $this->artTitle;
    }

    /**
     * @param null|string $artTitle
     */
    public function setArtTitle(?string $artTitle): void
    {
        $this->artTitle = $artTitle;
    }

    /**
     * @return null|string
     */
    public function getArtBody(): ?string
    {
        return $this->artBody;
    }

    /**
     * @param null|string $artBody
     */
    public function setArtBody(?string $artBody): void
    {
        $this->artBody = $artBody;
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
     * @return Therapeutist
     */
    public function getArtAuthor(): Therapeutist
    {
        return $this->artAuthor;
    }

    /**
     * @param Therapeutist $artAuthor
     */
    public function setArtAuthor(Therapeutist $artAuthor): void
    {
        $this->artAuthor = $artAuthor;
    }

}

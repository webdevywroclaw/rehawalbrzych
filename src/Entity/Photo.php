<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 *
 * @ORM\Table(name="photo", indexes={@ORM\Index(name="fk_photo_gallery1_idx", columns={"gallery_gal_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\PhotosRepository")
 */
class Photo
{
    /**
     * @var int
     *
     * @ORM\Column(name="photo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $photoId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo_src", type="string", length=45, nullable=true)
     */
    private $photoSrc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo_storage", type="string", length=45, nullable=true)
     */
    private $photoStorage;

    /**
     * @return int
     */
    public function getPhotoId(): int
    {
        return $this->photoId;
    }

    /**
     * @param int $photoId
     */
    public function setPhotoId(int $photoId): void
    {
        $this->photoId = $photoId;
    }

    /**
     * @return int
     */
    public function getPhotoGalId(): int
    {
        return $this->photoGalId;
    }

    /**
     * @param int $photoGalId
     */
    public function setPhotoGalId(int $photoGalId): void
    {
        $this->photoGalId = $photoGalId;
    }

    /**
     * @return null|string
     */
    public function getPhotoSrc(): ?string
    {
        return $this->photoSrc;
    }

    /**
     * @param null|string $photoSrc
     */
    public function setPhotoSrc(?string $photoSrc): void
    {
        $this->photoSrc = $photoSrc;
    }

    /**
     * @return null|string
     */
    public function getPhotoStorage(): ?string
    {
        return $this->photoStorage;
    }

    /**
     * @param null|string $photoStorage
     */
    public function setPhotoStorage(?string $photoStorage): void
    {
        $this->photoStorage = $photoStorage;
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
     * @return null|string
     */
    public function getPhotoTitle(): ?string
    {
        return $this->photoTitle;
    }

    /**
     * @param null|string $photoTitle
     */
    public function setPhotoTitle(?string $photoTitle): void
    {
        $this->photoTitle = $photoTitle;
    }

    /**
     * @var Gallery
     *
     * @ORM\ManyToOne(targetEntity="Gallery",  cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gallery_gal_id", referencedColumnName="gal_id")
     * })
     */
    private $galleryGal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo_title", type="string", length=45, nullable=true)
     */
    private $photoTitle;
}

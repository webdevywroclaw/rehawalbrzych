<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 *
 * @ORM\Table(name="photo", indexes={@ORM\Index(name="fk_photo_gallery1_idx", columns={"gallery_gal_id"})})
 * @ORM\Entity
 */
class Photo
{
    /**
     * @var int
     *
     * @ORM\Column(name="photo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $photoId;

    /**
     * @var int
     *
     * @ORM\Column(name="photo_gal_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $photoGalId;

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
     * @var \Gallery
     *
     * @ORM\ManyToOne(targetEntity="Gallery")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gallery_gal_id", referencedColumnName="gal_id")
     * })
     */
    private $galleryGal;


}

<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Method
 *
 * @ORM\Table(name="method", indexes={@ORM\Index(name="fk_method_category1_idx", columns={"category_cat_id"}), @ORM\Index(name="fk_method_gallery1_idx", columns={"gallery_gal_id"})})
 * @ORM\Entity
 */
class Method
{
    /**
     * @var int
     *
     * @ORM\Column(name="met_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $metId;

    /**
     * @var int
     *
     * @ORM\Column(name="met_cat_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $metCatId;

    /**
     * @var int
     *
     * @ORM\Column(name="met_gal_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $metGalId;

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
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_cat_id", referencedColumnName="cat_id")
     * })
     */
    private $categoryCat;

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

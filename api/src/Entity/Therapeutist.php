<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Therapeutist
 *
 * @ORM\Table(name="therapeutist", indexes={@ORM\Index(name="fk_therapeutist_method1_idx", columns={"method_met_id", "method_met_cat_id", "method_met_gal_id"}), @ORM\Index(name="fk_therapeutist_photo1_idx", columns={"photo_photo_id", "photo_photo_gal_id"}), @ORM\Index(name="fk_therapeutist_education1_idx", columns={"education_edu_id"})})
 * @ORM\Entity
 */
class Therapeutist
{
    /**
     * @var int
     *
     * @ORM\Column(name="therap_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $therapId;

    /**
     * @var string
     *
     * @ORM\Column(name="therap_name", type="string", length=45, nullable=false)
     */
    private $therapName;

    /**
     * @var string
     *
     * @ORM\Column(name="therap_surname", type="string", length=45, nullable=false)
     */
    private $therapSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="therap_desc", type="string", length=5000, nullable=false)
     */
    private $therapDesc;

    /**
     * @var \Education
     *
     * @ORM\ManyToOne(targetEntity="Education")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="education_edu_id", referencedColumnName="edu_id")
     * })
     */
    private $educationEdu;

    /**
     * @var \Method
     *
     * @ORM\ManyToOne(targetEntity="Method")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="method_met_id", referencedColumnName="met_id"),
     *   @ORM\JoinColumn(name="method_met_cat_id", referencedColumnName="met_cat_id"),
     *   @ORM\JoinColumn(name="method_met_gal_id", referencedColumnName="met_gal_id")
     * })
     */
    private $methodMet;

    /**
     * @var \Photo
     *
     * @ORM\ManyToOne(targetEntity="Photo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_photo_id", referencedColumnName="photo_id"),
     *   @ORM\JoinColumn(name="photo_photo_gal_id", referencedColumnName="photo_gal_id")
     * })
     */
    private $photoPhoto;


}

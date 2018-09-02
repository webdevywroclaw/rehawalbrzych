<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Therapeutist
 *
 * @ORM\Table(name="therapeutist", indexes={@ORM\Index(name="fk_therapeutist_method1_idx", columns={"method_met_id", "method_met_cat_id", "method_met_gal_id"}), @ORM\Index(name="fk_therapeutist_photo1_idx", columns={"photo_photo_id", "photo_photo_gal_id"}), @ORM\Index(name="fk_therapeutist_education1_idx", columns={"education_edu_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TherapeutistsRepository")
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
     * @var Education
     *
     * @ORM\ManyToOne(targetEntity="Education", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="education_edu_id", referencedColumnName="edu_id")
     * })
     */
    private $educationEdu;

    /**
     * @var Photo
     *
     * @ORM\ManyToOne(targetEntity="Photo",  cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_photo_id", referencedColumnName="photo_id"),
     * })
     */
    private $photoPhoto;

    /**
     * @return int
     */
    public function getTherapId(): int
    {
        return $this->therapId;
    }

    /**
     * @param int $therapId
     */
    public function setTherapId(int $therapId): void
    {
        $this->therapId = $therapId;
    }

    /**
     * @return string
     */
    public function getTherapName(): string
    {
        return $this->therapName;
    }

    /**
     * @param string $therapName
     */
    public function setTherapName(string $therapName): void
    {
        $this->therapName = $therapName;
    }

    /**
     * @return string
     */
    public function getTherapSurname(): string
    {
        return $this->therapSurname;
    }

    /**
     * @param string $therapSurname
     */
    public function setTherapSurname(string $therapSurname): void
    {
        $this->therapSurname = $therapSurname;
    }

    /**
     * @return string
     */
    public function getTherapDesc(): string
    {
        return $this->therapDesc;
    }

    /**
     * @param string $therapDesc
     */
    public function setTherapDesc(string $therapDesc): void
    {
        $this->therapDesc = $therapDesc;
    }

    /**
     * @return Education
     */
    public function getEducationEdu(): Education
    {
        return $this->educationEdu;
    }

    /**
     * @param Education $educationEdu
     */
    public function setEducationEdu(Education $educationEdu): void
    {
        $this->educationEdu = $educationEdu;
    }

    /**
     * @return Photo
     */
    public function getPhotoPhoto(): Photo
    {
        return $this->photoPhoto;
    }

    /**
     * @param Photo $photoPhoto
     */
    public function setPhotoPhoto(Photo $photoPhoto): void
    {
        $this->photoPhoto = $photoPhoto;
    }



}

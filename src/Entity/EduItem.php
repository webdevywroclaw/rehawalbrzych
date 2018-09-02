<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EduItem
 *
 * @ORM\Table(name="edu_item", indexes={@ORM\Index(name="fk_edu_item_category1_idx", columns={"category_cat_id"}), @ORM\Index(name="fk_edu_item_education1_idx", columns={"education_edu_id"})})
 * @ORM\Entity
 */
class EduItem
{
    /**
     * @var int
     *
     * @ORM\Column(name="edu_item_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eduItemId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="edu_item_name", type="string", length=45, nullable=true)
     */
    private $eduItemName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="edu_item_degree", type="string", length=45, nullable=true)
     */
    private $eduItemDegree;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_cat_id", referencedColumnName="cat_id")
     * })
     */
    private $categoryCat;

    /**
     * @var Education
     *
     * @ORM\ManyToOne(targetEntity="Education",  cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="education_edu_id", referencedColumnName="edu_id")
     * })
     */
    private $educationEdu;

    /**
     * @return int
     */
    public function getEduItemId(): int
    {
        return $this->eduItemId;
    }

    /**
     * @param int $eduItemId
     */
    public function setEduItemId(int $eduItemId): void
    {
        $this->eduItemId = $eduItemId;
    }

    /**
     * @return null|string
     */
    public function getEduItemName(): ?string
    {
        return $this->eduItemName;
    }

    /**
     * @param null|string $eduItemName
     */
    public function setEduItemName(?string $eduItemName): void
    {
        $this->eduItemName = $eduItemName;
    }

    /**
     * @return null|string
     */
    public function getEduItemDegree(): ?string
    {
        return $this->eduItemDegree;
    }

    /**
     * @param null|string $eduItemDegree
     */
    public function setEduItemDegree(?string $eduItemDegree): void
    {
        $this->eduItemDegree = $eduItemDegree;
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


}

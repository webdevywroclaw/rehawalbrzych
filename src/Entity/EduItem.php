<?php

namespace App\\Entity;

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
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_cat_id", referencedColumnName="cat_id")
     * })
     */
    private $categoryCat;

    /**
     * @var \Education
     *
     * @ORM\ManyToOne(targetEntity="Education")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="education_edu_id", referencedColumnName="edu_id")
     * })
     */
    private $educationEdu;


}

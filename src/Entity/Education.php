<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Education
 *
 * @ORM\Table(name="education")
 * @ORM\Entity
 */
class Education
{
    /**
     * @var int
     *
     * @ORM\Column(name="edu_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eduId;

    /**
     * @var string
     *
     * @ORM\Column(name="edu_name", type="string", length=45, nullable=false)
     */
    private $eduName;


}

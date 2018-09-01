<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MethodsTherapeutists
 *
 * @ORM\Table(name="methods_therapists", indexes={@ORM\Index(name="met_id", columns={"met_id"}), @ORM\Index(name="therap_id", columns={"therap_id"})})
 * @ORM\Entity
 */
class MethodsTherapeutists
{
    /**
     * @var int
     *
     * @ORM\Column(name="rel_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $relId;

    /**
     * @var Method
     *
     * @ORM\ManyToOne(targetEntity="Method",  cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="met_id", referencedColumnName="met_id")
     * })
     */
    private $metId;

    /**
     * @var Therapeutist
     *
     * @ORM\ManyToOne(targetEntity="Therapeutist",  cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="therap_id", referencedColumnName="therap_id")
     * })
     */
    private $therapId;

    /**
     * @return Method
     */
    public function getMetId(): Method
    {
        return $this->metId;
    }

    /**
     * @param Method $metId
     */
    public function setMetId(Method $metId): void
    {
        $this->metId = $metId;
    }

    /**
     * @return Therapeutist
     */
    public function getTherapId(): Therapeutist
    {
        return $this->therapId;
    }

    /**
     * @param Therapeutist $therapId
     */
    public function setTherapId(Therapeutist $therapId): void
    {
        $this->therapId = $therapId;
    }



}

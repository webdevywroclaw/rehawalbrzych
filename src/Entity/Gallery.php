<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity(repositoryClass="App\Repository\GalleriesRepository")
 */
class Gallery
{

    /**
     * @var int
     *
     * @ORM\Column(name="gal_id", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $galId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gal_name", type="string", length=45, nullable=true)
     */
    private $galName;

    /**
     * @var Article
     *
     * @ORM\ManyToOne(targetEntity="Article",  cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="art_id", referencedColumnName="art_id")
     * })
     */
    private $artId;

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
     * @return int
     */
    public function getGalId(): int
    {
        return $this->galId;
    }

    /**
     * @param int $galId
     */
    public function setGalId(int $galId): void
    {
        $this->galId = $galId;
    }

    /**
     * @return null|string
     */
    public function getGalName(): ?string
    {
        return $this->galName;
    }

    /**
     * @param null|string $galName
     */
    public function setGalName(?string $galName): void
    {
        $this->galName = $galName;
    }

    /**
     * @return Article
     */
    public function getArtId(): Article
    {
        return $this->artId;
    }

    /**
     * @param Article $artId
     */
    public function setArtId(Article $artId): void
    {
        $this->artId = $artId;
    }

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



}

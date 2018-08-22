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
     * @var int
     *
     * @ORM\Column(name="gal_id", type="integer", nullable=false)
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


}

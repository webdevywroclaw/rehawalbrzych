<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles", uniqueConstraints={@ORM\UniqueConstraint(name="art_slug_UNIQUE", columns={"art_slug"})}, indexes={@ORM\Index(name="fk_articles_categories_idx", columns={"art_cat_id"}), @ORM\Index(name="fk_articles_users1_idx", columns={"art_usr_id"}), @ORM\Index(name="fk_articles_galleries1_idx", columns={"art_gal_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */

class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="art_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $artId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="art_title", type="string", length=255, nullable=true)
     */
    private $artTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="art_slug", type="string", length=255, nullable=true)
     */
    private $artSlug;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="art_status", type="boolean", nullable=true)
     */
    private $artStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="art_body", type="text", length=65535, nullable=true)
     */
    private $artBody;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="art_date", type="datetime", nullable=true)
     */
    private $artDate;

    /**
     * @var Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories",  cascade={"persist", "remove" })
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="art_cat_id", referencedColumnName="cat_id")
     * })
     */
    private $artCat;

    /**
     * @var Galleries
     *
     * @ORM\ManyToOne(targetEntity="Galleries",  cascade={"persist", "remove" })
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="art_gal_id", referencedColumnName="gal_id")
     * })
     */
    private $artGal;

    /**
     * @var Users
     *
     * @ORM\ManyToOne(targetEntity="Users",  cascade={"persist", "remove" })
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="art_usr_id", referencedColumnName="usr_id")
     * })
     */
    private $artUsr;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tags", mappedBy="articlesArt")
     */
    private $tagsTag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tagsTag = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getArtId(): int
    {
        return $this->artId;
    }

    /**
     * @param int $artId
     */
    public function setArtId(int $artId): void
    {
        $this->artId = $artId;
    }

    /**
     * @return null|string
     */
    public function getArtTitle(): ?string
    {
        return $this->artTitle;
    }

    /**
     * @param null|string $artTitle
     */
    public function setArtTitle(?string $artTitle): void
    {
        $this->artTitle = $artTitle;
    }

    /**
     * @return null|string
     */
    public function getArtSlug(): ?string
    {
        return $this->artSlug;
    }

    /**
     * @param null|string $artSlug
     */
    public function setArtSlug(?string $artSlug): void
    {
        $this->artSlug = $artSlug;
    }

    /**
     * @return bool|null
     */
    public function getArtStatus(): ?bool
    {
        return $this->artStatus;
    }

    /**
     * @param bool|null $artStatus
     */
    public function setArtStatus(?bool $artStatus): void
    {
        $this->artStatus = $artStatus;
    }

    /**
     * @return null|string
     */
    public function getArtBody(): ?string
    {
        return $this->artBody;
    }

    /**
     * @param null|string $artBody
     */
    public function setArtBody(?string $artBody): void
    {
        $this->artBody = $artBody;
    }

    /**
     * @return \DateTime|null
     */
    public function getArtDate(): ?\DateTime
    {
        return $this->artDate;
    }

    /**
     * @param \DateTime|null $artDate
     */
    public function setArtDate(?\DateTime $artDate): void
    {
        $this->artDate = $artDate;
    }

    /**
     * @return Categories
     */
    public function getArtCat(): Categories
    {
        return $this->artCat;
    }

    /**
     * @param Categories $artCat
     */
    public function setArtCat(Categories $artCat): void
    {
        $this->artCat = $artCat;
    }

    /**
     * @return Galleries
     */
    public function getArtGal(): Galleries
    {
        return $this->artGal;
    }

    /**
     * @param Galleries $artGal
     */
    public function setArtGal(Galleries $artGal): void
    {
        $this->artGal = $artGal;
    }

    /**
     * @return Users
     */
    public function getArtUsr(): Users
    {
        return $this->artUsr;
    }

    /**
     * @param Users $artUsr
     */
    public function setArtUsr(Users $artUsr): void
    {
        $this->artUsr = $artUsr;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTagsTag(): \Doctrine\Common\Collections\Collection
    {
        return $this->tagsTag;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $tagsTag
     */
    public function setTagsTag(\Doctrine\Common\Collections\Collection $tagsTag): void
    {
        $this->tagsTag = $tagsTag;
    }
}


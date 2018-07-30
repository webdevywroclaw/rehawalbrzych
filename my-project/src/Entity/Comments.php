<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="fk_comments_users1_idx", columns={"cmt_usr_id"})})
 * @ORM\Entity
 */
class Comments
{
    /**
     * @var int
     *
     * @ORM\Column(name="cmt_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cmtId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cmt_body", type="string", length=45, nullable=true)
     */
    private $cmtBody;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="cmt_status", type="boolean", nullable=true)
     */
    private $cmtStatus;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cmt_usr_id", referencedColumnName="usr_id")
     * })
     */
    private $cmtUsr;


}

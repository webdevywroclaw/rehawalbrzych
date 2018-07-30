<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="usr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usrId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="usr_name", type="string", length=255, nullable=true)
     */
    private $usrName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="usr_password", type="string", length=255, nullable=true)
     */
    private $usrPassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="usr_email", type="string", length=255, nullable=true)
     */
    private $usrEmail;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="usr_status", type="boolean", nullable=true)
     */
    private $usrStatus;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="usr_role", type="boolean", nullable=true)
     */
    private $usrRole;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="usr_date", type="datetime", nullable=true)
     */
    private $usrDate;


}

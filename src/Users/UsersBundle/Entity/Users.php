<?php

namespace Users\UsersBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class Users extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    public function __construct()
    {
        parent::__construct();
//        $this->guest = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->company = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\OneToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Guests", mappedBy="user", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $guest;

    /**
     * @ORM\OneToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Companies", mappedBy="user", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $company;




    /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
    protected $facebook_id;

    /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
    protected $facebook_access_token;







//    /**
//     * @var string
//     *
//     * @ORM\Column(name="facebook_id", type="string", nullable=true)
//     */
//    protected $facebookId;


//    /**
//     * @var string
//     *
//     * @ORM\Column(name="github_id", type="string", nullable=true)
//     */
//    private $githubID;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set guest
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Guests $guest
     * @return Users
     */
    public function setGuest(\Kvartiri\KvartiriBundle\Entity\Guests $guest = null)
    {
        $this->guest = $guest;

        return $this;
    }

    /**
     * Get guest
     *
     * @return \Kvartiri\KvartiriBundle\Entity\Guests 
     */
    public function getGuest()
    {
        return $this->guest;
    }


    /**
     * Set company
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Companies $company
     * @return Users
     */
    public function setCompany(\Kvartiri\KvartiriBundle\Entity\Companies $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Kvartiri\KvartiriBundle\Entity\Companies 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set facebook_id
     *
     * @param string $facebookId
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebook_id = $facebookId;

        return $this;
    }

    /**
     * Get facebook_id
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    /**
     * Set facebook_access_token
     *
     * @param string $facebookAccessToken
     * @return User
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebook_access_token = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebook_access_token
     *
     * @return string
     */
    public function getFacebookAccessToken()
    {
        return $this->facebook_access_token;
    }


}

<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacts
 *
 * @ORM\Table("contacts")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\ContactsRepository")
 */
class Contacts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=125)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=125)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_1", type="string", length=125)
     */
    private $phone1;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_2", type="string", length=125)
     */
    private $phone2;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=125)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=125)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="web_site", type="string", length=125)
     */
    private $webSite;

    /**
     * @ORM\OneToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Hotels")
     * @ORM\JoinColumn(nullable=true)
     */
    private $hotel;

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
     * Set lastName
     *
     * @param string $lastName
     * @return Contacts
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Contacts
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set phone1
     *
     * @param string $phone1
     * @return Contacts
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;

        return $this;
    }

    /**
     * Get phone1
     *
     * @return string 
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * Set phone2
     *
     * @param string $phone2
     * @return Contacts
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * Get phone2
     *
     * @return string 
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Contacts
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contacts
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set webSite
     *
     * @param string $webSite
     * @return Contacts
     */
    public function setWebSite($webSite)
    {
        $this->webSite = $webSite;

        return $this;
    }

    /**
     * Get webSite
     *
     * @return string 
     */
    public function getWebSite()
    {
        return $this->webSite;
    }


    /**
     * Set hotel
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Hotels $hotel
     * @return Contacts
     */
    public function setHotel(\Kvartiri\KvartiriBundle\Entity\Hotels $hotel = null)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \Kvartiri\KvartiriBundle\Entity\Hotels 
     */
    public function getHotel()
    {
        return $this->hotel;
    }
}

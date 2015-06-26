<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guests
 *
 * @ORM\Table("guests")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\GuestsRepository")
 */
class Guests
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    public function __construct()
    {
        $this->selection = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\OneToOne(targetEntity="Users\UsersBundle\Entity\Users", inversedBy="guest")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\Selection", mappedBy="guest", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $selection;



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
     * @ORM\Column(name="phone", type="string", length=125)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var integer
     *
     * @ORM\Column(name="zip", type="integer")
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=125)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=125)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=125)
     */
    private $complement;





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
     * @return Guests
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
     * @return Guests
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
     * Set phone
     *
     * @param string $phone
     * @return Guests
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Guests
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip
     *
     * @param integer $zip
     * @return Guests
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return integer 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Guests
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Guests
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set complement
     *
     * @param string $complement
     * @return Guests
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get complement
     *
     * @return string 
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set user
     *
     * @param \Users\UsersBundle\Entity\Users $user
     * @return Guests
     */
    public function setUser(\Users\UsersBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Users\UsersBundle\Entity\Users 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add selection
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Selection $selection
     * @return Guests
     */
    public function addSelection(\Kvartiri\KvartiriBundle\Entity\Selection $selection)
    {
        $this->selection[] = $selection;

        return $this;
    }

    /**
     * Remove selection
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Selection $selection
     */
    public function removeSelection(\Kvartiri\KvartiriBundle\Entity\Selection $selection)
    {
        $this->selection->removeElement($selection);
    }

    /**
     * Get selection
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSelection()
    {
        return $this->selection;
    }
}

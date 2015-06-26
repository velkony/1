<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Companies
 *
 * @ORM\Table("companies")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\CompaniesRepository")
 */
class Companies
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
        $this->companyHotels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\OneToOne(targetEntity="Users\UsersBundle\Entity\Users", inversedBy="company", cascade={"persist", "remove"})
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\CompanyHotels", mappedBy="hotelsCompany", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $companyHotels;


    /**
     * @var string
     *
     * @ORM\Column(name="compony_name", type="string", length=255)
     */
    private $componyName;

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
     * @ORM\Column(name="address", type="string", length=125)
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
     * Set componyName
     *
     * @param string $componyName
     * @return Companies
     */
    public function setComponyName($componyName)
    {
        $this->componyName = $componyName;

        return $this;
    }

    /**
     * Get componyName
     *
     * @return string 
     */
    public function getComponyName()
    {
        return $this->componyName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Companies
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
     * @return Companies
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
     * @return Companies
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
     * @return Companies
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
     * @return Companies
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
     * @return Companies
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
     * @return Companies
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
     * @return Companies
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
     * @return Companies
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
     * Add companyHotels
     *
     * @param \Kvartiri\KvartiriBundle\Entity\CompanyHotels $companyHotels
     * @return Companies
     */
    public function addCompanyHotel(\Kvartiri\KvartiriBundle\Entity\CompanyHotels $companyHotels)
    {
        $this->companyHotels[] = $companyHotels;

        return $this;
    }

    /**
     * Remove companyHotels
     *
     * @param \Kvartiri\KvartiriBundle\Entity\CompanyHotels $companyHotels
     */
    public function removeCompanyHotel(\Kvartiri\KvartiriBundle\Entity\CompanyHotels $companyHotels)
    {
        $this->companyHotels->removeElement($companyHotels);
    }

    /**
     * Get companyHotels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanyHotels()
    {
        return $this->companyHotels;
    }
}

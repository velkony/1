<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cities
 *
 * @ORM\Table("cities")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\CitiesRepository")
 */
class Cities
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
        $this->hotels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=125)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Regions", inversedBy="cities", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $region;


    /**
     * @ORM\OneToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\Hotels", mappedBy="city", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $hotels;

    public function __toString()
    {
        return $this->getName();
    }



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
     * Set name
     *
     * @param string $name
     * @return Cities
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set region
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Regions $region
     * @return Cities
     */
    public function setRegion(\Kvartiri\KvartiriBundle\Entity\Regions $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Kvartiri\KvartiriBundle\Entity\Regions 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Add hotels
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Hotels $hotels
     * @return Cities
     */
    public function addHotel(\Kvartiri\KvartiriBundle\Entity\Hotels $hotels)
    {
        $this->hotels[] = $hotels;

        return $this;
    }

    /**
     * Remove hotels
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Hotels $hotels
     */
    public function removeHotel(\Kvartiri\KvartiriBundle\Entity\Hotels $hotels)
    {
        $this->hotels->removeElement($hotels);
    }

    /**
     * Get hotels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHotels()
    {
        return $this->hotels;
    }

}

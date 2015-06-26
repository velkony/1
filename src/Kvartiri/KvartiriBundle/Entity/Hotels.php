<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotels
 *
 * @ORM\Table("hotels")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\HotelsRepository")
 */
class Hotels
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
//        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->hotelType = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->hotelService = new \Doctrine\Common\Collections\ArrayCollection();
        $this->rooms = new \Doctrine\Common\Collections\ArrayCollection();
        $this->seasons = new \Doctrine\Common\Collections\ArrayCollection();
        $this->video = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="hotel_code", type="integer")
     */
    private $hotelCode;


    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean")
     */
    private $available;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=125)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="remarks", type="string", length=255)
     */
    private $remarks;

    /**
     * @ORM\ManyToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Cities", inversedBy="hotels", cascade={"persist"} )
     * @ORM\JoinColumn(nullable=true)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="hotel_type", type="integer")
     */
    private $hotelType;

    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\HotelSeasons", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $hotelSeasons;

    /**
     * @ORM\OneToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\Rooms", mappedBy="hotel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $rooms;


    /**
     * @ORM\OneToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\Promotions", mappedBy="hotel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $promotions;


    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\Images", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $images;


    /**
     * @ORM\OneToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\Videos", mappedBy="hotel", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $videos;



    /**
     * @ORM\OneToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Distance", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $distance;

    /**
     * @ORM\OneToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\GPS", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $gps;

    /**
     * @ORM\OneToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Address", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\HotelService", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $service;




















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
     * @return Hotels
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
     * Set description
     *
     * @param string $description
     * @return Hotels
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     * @return Hotels
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string 
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Set city
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Cities $city
     * @return Hotels
     */
    public function setCity(\Kvartiri\KvartiriBundle\Entity\Cities $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \Kvartiri\KvartiriBundle\Entity\Cities 
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * Add rooms
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Rooms $rooms
     * @return Hotels
     */
    public function addRoom(\Kvartiri\KvartiriBundle\Entity\Rooms $rooms)
    {
        $this->rooms[] = $rooms;

        return $this;
    }

    /**
     * Remove rooms
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Rooms $rooms
     */
    public function removeRoom(\Kvartiri\KvartiriBundle\Entity\Rooms $rooms)
    {
        $this->rooms->removeElement($rooms);
    }

    /**
     * Get rooms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRooms()
    {
        return $this->rooms;
    }


    /**
     * Add videos
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Videos $videos
     * @return Hotels
     */
    public function addVideo(\Kvartiri\KvartiriBundle\Entity\Videos $videos)
    {
        $this->videos[] = $videos;

        return $this;
    }

    /**
     * Remove videos
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Videos $videos
     */
    public function removeVideo(\Kvartiri\KvartiriBundle\Entity\Videos $videos)
    {
        $this->videos->removeElement($videos);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVideos()
    {
        return $this->videos;
    }


    /**
     * Set hotelType
     *
     * @param integer $hotelType
     * @return Hotels
     */
    public function setHotelType($hotelType)
    {
        $this->hotelType = $hotelType;

        return $this;
    }

    /**
     * Get hotelType
     *
     * @return integer 
     */
    public function getHotelType()
    {
        return $this->hotelType;
    }




    /**
     * Add images
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Images $images
     * @return Hotels
     */
    public function addImage(\Kvartiri\KvartiriBundle\Entity\Images $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Images $images
     */
    public function removeImage(\Kvartiri\KvartiriBundle\Entity\Images $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set available
     *
     * @param boolean $available
     * @return Hotels
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean 
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Add hotelSeasons
     *
     * @param \Kvartiri\KvartiriBundle\Entity\HotelSeasons $hotelSeasons
     * @return Hotels
     */
    public function addHotelSeason(\Kvartiri\KvartiriBundle\Entity\HotelSeasons $hotelSeasons)
    {
        $this->hotelSeasons[] = $hotelSeasons;

        return $this;
    }

    /**
     * Remove hotelSeasons
     *
     * @param \Kvartiri\KvartiriBundle\Entity\HotelSeasons $hotelSeasons
     */
    public function removeHotelSeason(\Kvartiri\KvartiriBundle\Entity\HotelSeasons $hotelSeasons)
    {
        $this->hotelSeasons->removeElement($hotelSeasons);
    }

    /**
     * Get hotelSeasons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHotelSeasons()
    {
        return $this->hotelSeasons;
    }

    /**
     * Set hotelCode
     *
     * @param integer $hotelCode
     * @return Hotels
     */
    public function setHotelCode($hotelCode)
    {
        $this->hotelCode = $hotelCode;

        return $this;
    }

    /**
     * Get hotelCode
     *
     * @return integer 
     */
    public function getHotelCode()
    {
        return $this->hotelCode;
    }

    /**
     * Set distance
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Distance $distance
     * @return Hotels
     */
    public function setDistance(\Kvartiri\KvartiriBundle\Entity\Distance $distance = null)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return \Kvartiri\KvartiriBundle\Entity\Distance 
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set gps
     *
     * @param \Kvartiri\KvartiriBundle\Entity\GPS $gps
     * @return Hotels
     */
    public function setGps(\Kvartiri\KvartiriBundle\Entity\GPS $gps = null)
    {
        $this->gps = $gps;

        return $this;
    }

    /**
     * Get gps
     *
     * @return \Kvartiri\KvartiriBundle\Entity\GPS 
     */
    public function getGps()
    {
        return $this->gps;
    }

    /**
     * Set address
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Address $address
     * @return Hotels
     */
    public function setAddress(\Kvartiri\KvartiriBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Kvartiri\KvartiriBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set service
     *
     * @param \Kvartiri\KvartiriBundle\Entity\HotelService $service
     * @return Hotels
     */
    public function setService(\Kvartiri\KvartiriBundle\Entity\HotelService $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Kvartiri\KvartiriBundle\Entity\HotelService 
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Add promotions
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Promotions $promotions
     * @return Hotels
     */
    public function addPromotion(\Kvartiri\KvartiriBundle\Entity\Promotions $promotions)
    {
        $this->promotions[] = $promotions;

        return $this;
    }

    /**
     * Remove promotions
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Promotions $promotions
     */
    public function removePromotion(\Kvartiri\KvartiriBundle\Entity\Promotions $promotions)
    {
        $this->promotions->removeElement($promotions);
    }

    /**
     * Get promotions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromotions()
    {
        return $this->promotions;
    }
}

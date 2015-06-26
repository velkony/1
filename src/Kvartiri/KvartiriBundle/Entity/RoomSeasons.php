<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoomSeasons
 *
 * @ORM\Table("room_seasons")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\RoomSeasonsRepository")
 */
class RoomSeasons
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
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;


    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\HotelSeasons", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $hotelSeasons;
    
    /**
     * Constructor
     */
//    public function __construct()
//    {
//        $this->hotelSeasons = new \Doctrine\Common\Collections\ArrayCollection();
//    }

//    public function __toString()
//    {
//        return $this->getHotelSeasons()->getName();
//    }

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
     * Set price
     *
     * @param float $price
     * @return RoomSeasons
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hotelSeasons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add hotelSeasons
     *
     * @param \Kvartiri\KvartiriBundle\Entity\HotelSeasons $hotelSeasons
     * @return RoomSeasons
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
}

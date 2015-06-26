<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rooms
 *
 * @ORM\Table("rooms")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\RoomsRepository")
 */
class Rooms
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
     * @ORM\ManyToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Hotels", inversedBy="rooms", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $hotel;


    /**
     * @var integer
     *
     * @ORM\Column(name="room_type", type="integer")
     */
    private $roomType;



    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\RoomSeasons", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $roomSeasons;

    /**
     * @var integer
     *
     * @ORM\Column(name="guests_max", type="integer")
     */
    private $guestsMax;

    /**
     * @var boolean
     *
     * @ORM\Column(name="extra_bed", type="boolean")
     */
    private $extraBed;

    /**
     * @ORM\OneToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\RoomEquipment", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $roomEquipment;

    public function __construct()
    {
//        $this->roomEquipment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roomSeasons = new \Doctrine\Common\Collections\ArrayCollection();

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
     * Set guestsMax
     *
     * @param integer $guestsMax
     * @return Room
     */
    public function setGuestsMax($guestsMax)
    {
        $this->guestsMax = $guestsMax;

        return $this;
    }

    /**
     * Get guestsMax
     *
     * @return integer 
     */
    public function getGuestsMax()
    {
        return $this->guestsMax;
    }

    /**
     * Set extraBed
     *
     * @param boolean $extraBed
     * @return Room
     */
    public function setExtraBed($extraBed)
    {
        $this->extraBed = $extraBed;

        return $this;
    }

    /**
     * Get extraBed
     *
     * @return boolean 
     */
    public function getExtraBed()
    {
        return $this->extraBed;
    }
    

    /**
     * Set hotel
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Hotels $hotel
     * @return Rooms
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

    /**
     * Set roomType
     *
     * @param integer $roomType
     * @return Rooms
     */
    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;

        return $this;
    }

    /**
     * Get roomType
     *
     * @return integer 
     */
    public function getRoomType()
    {
        return $this->roomType;
    }

    public function __toString()
    {
        return $this->getRoomTypes()->getNameTypeEn().'-id-'. $this->getId();
    }

    /**
     * Add roomSeasons
     *
     * @param \Kvartiri\KvartiriBundle\Entity\RoomSeasons $roomSeasons
     * @return Rooms
     */
    public function addRoomSeason(\Kvartiri\KvartiriBundle\Entity\RoomSeasons $roomSeasons)
    {
        $this->roomSeasons[] = $roomSeasons;

        return $this;
    }

    /**
     * Remove roomSeasons
     *
     * @param \Kvartiri\KvartiriBundle\Entity\RoomSeasons $roomSeasons
     */
    public function removeRoomSeason(\Kvartiri\KvartiriBundle\Entity\RoomSeasons $roomSeasons)
    {
        $this->roomSeasons->removeElement($roomSeasons);
    }

    /**
     * Get roomSeasons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoomSeasons()
    {
        return $this->roomSeasons;
    }

    /**
     * Set roomEquipment
     *
     * @param \Kvartiri\KvartiriBundle\Entity\RoomEquipment $roomEquipment
     * @return Rooms
     */
    public function setRoomEquipment(\Kvartiri\KvartiriBundle\Entity\RoomEquipment $roomEquipment = null)
    {
        $this->roomEquipment = $roomEquipment;

        return $this;
    }

    /**
     * Get roomEquipment
     *
     * @return \Kvartiri\KvartiriBundle\Entity\RoomEquipment 
     */
    public function getRoomEquipment()
    {
        return $this->roomEquipment;
    }
}

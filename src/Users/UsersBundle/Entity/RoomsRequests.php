<?php

namespace Users\UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoomsRequests
 *
 * @ORM\Table("rooms_requests")
 * @ORM\Entity(repositoryClass="Users\UsersBundle\Repository\RoomsRequestsRepository")
 */
class RoomsRequests
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
     * @var integer
     *
     * @ORM\Column(name="number_rooms", type="integer", nullable=true)
     */
    private $numberRooms;

    /**
     * @var integer
     *
     * @ORM\Column(name="room_id", type="integer", nullable=true)
     */
    private $roomId;

    /**
     * @var string
     *
     * @ORM\Column(name="room_type", type="string", length=20, nullable=true)
     */
    private $roomType;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_beds", type="integer", nullable=true)
     */
    private $numberBeds;

    /**
     * @var integer
     *
     * @ORM\Column(name="extra_bed", type="integer", nullable=true)
     */
    private $extraBed;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_adults", type="integer", nullable=true)
     */
    private $numberAdults;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_children", type="integer", nullable=true)
     */
    private $numberChildren;

    /**
     * @var string
     *
     * @ORM\Column(name="children_age", type="string", length=80, nullable=true)
     */
    private $childrenAge;

//    /**
//     * @ORM\ManyToOne(targetEntity="Users\UsersBundle\Entity\ClientsRequests", inversedBy="roomsRequests", cascade={"persist", "remove"})
//     * @ORM\JoinColumn(nullable=true)
//     */
//    private $clientRequest;


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
     * Set numberRooms
     *
     * @param integer $numberRooms
     * @return RoomsRequests
     */
    public function setNumberRooms($numberRooms)
    {
        $this->numberRooms = $numberRooms;

        return $this;
    }

    /**
     * Get numberRooms
     *
     * @return integer 
     */
    public function getNumberRooms()
    {
        return $this->numberRooms;
    }

    /**
     * Set roomId
     *
     * @param integer $roomId
     * @return RoomsRequests
     */
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;

        return $this;
    }

    /**
     * Get roomId
     *
     * @return integer 
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * Set roomType
     *
     * @param string $roomType
     * @return RoomsRequests
     */
    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;

        return $this;
    }

    /**
     * Get roomType
     *
     * @return string
     */
    public function getRoomType()
    {
        return $this->roomType;
    }

    /**
     * Set numberBeds
     *
     * @param integer $numberBeds
     * @return RoomsRequests
     */
    public function setNumberBeds($numberBeds)
    {
        $this->numberBeds = $numberBeds;

        return $this;
    }

    /**
     * Get numberBeds
     *
     * @return integer 
     */
    public function getNumberBeds()
    {
        return $this->numberBeds;
    }

    /**
     * Set extraBed
     *
     * @param integer $extraBed
     * @return RoomsRequests
     */
    public function setExtraBed($extraBed)
    {
        $this->extraBed = $extraBed;

        return $this;
    }

    /**
     * Get extraBed
     *
     * @return integer 
     */
    public function getExtraBed()
    {
        return $this->extraBed;
    }

    /**
     * Set numberAdults
     *
     * @param integer $numberAdults
     * @return RoomsRequests
     */
    public function setNumberAdults($numberAdults)
    {
        $this->numberAdults = $numberAdults;

        return $this;
    }

    /**
     * Get numberAdults
     *
     * @return integer 
     */
    public function getNumberAdults()
    {
        return $this->numberAdults;
    }

    /**
     * Set numberChildren
     *
     * @param integer $numberChildren
     * @return RoomsRequests
     */
    public function setNumberChildren($numberChildren)
    {
        $this->numberChildren = $numberChildren;

        return $this;
    }

    /**
     * Get numberChildren
     *
     * @return integer 
     */
    public function getNumberChildren()
    {
        return $this->numberChildren;
    }

    /**
     * Set childrenAge
     *
     * @param string $childrenAge
     * @return RoomsRequests
     */
    public function setChildrenAge($childrenAge)
    {
        $this->childrenAge = $childrenAge;

        return $this;
    }

    /**
     * Get childrenAge
     *
     * @return string 
     */
    public function getChildrenAge()
    {
        return $this->childrenAge;
    }
}

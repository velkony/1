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
     * @ORM\Column(name="numberRooms", type="integer")
     */
    private $numberRooms;

    /**
     * @var integer
     *
     * @ORM\Column(name="roomType", type="integer")
     */
    private $roomType;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberBeds", type="integer")
     */
    private $numberBeds;

    /**
     * @var integer
     *
     * @ORM\Column(name="extraBed", type="integer")
     */
    private $extraBed;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberAdults", type="integer")
     */
    private $numberAdults;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberChildren", type="integer")
     */
    private $numberChildren;

    /**
     * @var string
     *
     * @ORM\Column(name="childrenAge", type="string", length=80)
     */
    private $childrenAge;

    /**
     * @ORM\ManyToMany(targetEntity="Users\UsersBundle\Entity\ClientsRequests", mappedBy="roomsRequests")
     * @ORM\JoinColumn(nullable=true)
     */
    private $clientRequest;



//    public function __toString() {
//        return $this->roomId;
//    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clientRequest = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set roomType
     *
     * @param integer $roomType
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
     * @return integer 
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


    /**
     * Add clientRequest
     *
     * @param \Users\UsersBundle\Entity\ClientsRequests $clientRequest
     * @return RoomsRequests
     */
    public function addClientRequest(\Users\UsersBundle\Entity\ClientsRequests $clientRequest)
    {
        $this->clientRequest[] = $clientRequest;


        return $this;
    }

    /**
     * Remove clientRequest
     *
     * @param \Users\UsersBundle\Entity\ClientsRequests $clientRequest
     */
    public function removeClientRequest(\Users\UsersBundle\Entity\ClientsRequests $clientRequest)
    {
        $this->clientRequest->removeElement($clientRequest);
    }

    /**
     * Get clientRequest
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClientRequest()
    {
        return $this->clientRequest;
    }
}

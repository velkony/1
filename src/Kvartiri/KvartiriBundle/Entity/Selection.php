<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Selection
 *
 * @ORM\Table("selections")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\SelectionRepository")
 */
class Selection
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
        $this->booking = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Guests", inversedBy="selection", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $guest;


    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\Booking", inversedBy="selection", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="selection_booking",
     *      joinColumns={@ORM\JoinColumn(name="selection_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="booking_id", referencedColumnName="id")}
     *      )
     */
    private $booking;


    /**
     * @var integer
     *
     * @ORM\Column(name="hotel_id", type="integer")
     */
    private $hotelId;

    /**
     * @var integer
     *
     * @ORM\Column(name="room_id", type="integer")
     */
    private $roomId;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="period", type="datetime")
     */
    private $period;



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
     * Set hotelId
     *
     * @param integer $hotelId
     * @return Selection
     */
    public function setHotelId($hotelId)
    {
        $this->hotelId = $hotelId;

        return $this;
    }

    /**
     * Get hotelId
     *
     * @return integer 
     */
    public function getHotelId()
    {
        return $this->hotelId;
    }

    /**
     * Set roomId
     *
     * @param integer $roomId
     * @return Selection
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
     * Set period
     *
     * @param \DateTime $period
     * @return Selection
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return \DateTime 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set guest
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Guests $guest
     * @return Selection
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
     * Add booking
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Booking $booking
     * @return Selection
     */
    public function addBooking(\Kvartiri\KvartiriBundle\Entity\Booking $booking)
    {
        $this->booking[] = $booking;
        $booking->addSelection($this);

        return $this;
    }

    /**
     * Remove booking
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Booking $booking
     */
    public function removeBooking(\Kvartiri\KvartiriBundle\Entity\Booking $booking)
    {
        $this->booking->removeElement($booking);
    }

    /**
     * Get booking
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBooking()
    {
        return $this->booking;
    }
}

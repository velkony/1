<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seasons
 *
 * @ORM\Table("hotel_seasons")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\HotelSeasonsRepository")
 */
class HotelSeasons
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
     * @ORM\ManyToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Hotels", inversedBy="hotelSeasons", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $hotel;

    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\RoomSeasons", inversedBy="hotelSeasons")
     * @ORM\JoinTable(name="hotel_room_seasons",
     *      joinColumns={@ORM\JoinColumn(name="hotel_season_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="room_season_id", referencedColumnName="id")}
     *      )
     */
    private $roomSeasons;

    public function __construct()
    {
        $this->roomSeasons = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->hotelReductions = new \Doctrine\Common\Collections\ArrayCollection();

    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finish", type="datetime")
     */
    private $finish;
    

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
     * Set start
     *
     * @param \DateTime $start
     * @return HotelSeasons
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set finish
     *
     * @param \DateTime $finish
     * @return HotelSeasons
     */
    public function setFinish($finish)
    {
        $this->finish = $finish;

        return $this;
    }

    /**
     * Get finish
     *
     * @return \DateTime 
     */
    public function getFinish()
    {
        return $this->finish;
    }

    /**
     * Set hotel
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Hotels $hotel
     * @return HotelSeasons
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
     * Add roomSeasons
     *
     * @param \Kvartiri\KvartiriBundle\Entity\RoomSeasons $roomSeasons
     * @return HotelSeasons
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

}

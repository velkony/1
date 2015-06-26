<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HotelService
 *
 * @ORM\Table("hotel_service")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\HotelServiceRepository")
 */
class HotelService
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
     * @var boolean
     *
     * @ORM\Column(name="restaurant", type="boolean")
     */
    private $restaurant;

    /**
     * @var boolean
     *
     * @ORM\Column(name="breakfast_room", type="boolean")
     */
    private $breakfastRoom;

    /**
     * @var boolean
     *
     * @ORM\Column(name="garden", type="boolean")
     */
    private $garden;

    /**
     * @var boolean
     *
     * @ORM\Column(name="BBQ", type="boolean")
     */
    private $bbq;

    /**
     * @var boolean
     *
     * @ORM\Column(name="parking", type="boolean")
     */
    private $parking;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fitness", type="boolean")
     */
    private $fitness;

    /**
     * @var boolean
     *
     * @ORM\Column(name="playground", type="boolean")
     */
    private $playground;

    /**
     * @var boolean
     *
     * @ORM\Column(name="playground_for_children", type="boolean")
     */
    private $playgroundForChildren;

    /**
     * @var boolean
     *
     * @ORM\Column(name="laundry", type="boolean")
     */
    private $laundry;


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
     * Set restaurant
     *
     * @param boolean $restaurant
     * @return HotelService
     */
    public function setRestaurant($restaurant)
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    /**
     * Get restaurant
     *
     * @return boolean 
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * Set breakfastRoom
     *
     * @param boolean $breakfastRoom
     * @return HotelService
     */
    public function setBreakfastRoom($breakfastRoom)
    {
        $this->breakfastRoom = $breakfastRoom;

        return $this;
    }

    /**
     * Get breakfastRoom
     *
     * @return boolean 
     */
    public function getBreakfastRoom()
    {
        return $this->breakfastRoom;
    }

    /**
     * Set garden
     *
     * @param boolean $garden
     * @return HotelService
     */
    public function setGarden($garden)
    {
        $this->garden = $garden;

        return $this;
    }

    /**
     * Get garden
     *
     * @return boolean 
     */
    public function getGarden()
    {
        return $this->garden;
    }

    /**
     * Set bbq
     *
     * @param boolean $bbq
     * @return HotelService
     */
    public function setBbq($bbq)
    {
        $this->bbq = $bbq;

        return $this;
    }

    /**
     * Get bbq
     *
     * @return boolean 
     */
    public function getBbq()
    {
        return $this->bbq;
    }

    /**
     * Set parking
     *
     * @param boolean $parking
     * @return HotelService
     */
    public function setParking($parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * Get parking
     *
     * @return boolean 
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * Set fitness
     *
     * @param boolean $fitness
     * @return HotelService
     */
    public function setFitness($fitness)
    {
        $this->fitness = $fitness;

        return $this;
    }

    /**
     * Get fitness
     *
     * @return boolean 
     */
    public function getFitness()
    {
        return $this->fitness;
    }

    /**
     * Set playground
     *
     * @param boolean $playground
     * @return HotelService
     */
    public function setPlayground($playground)
    {
        $this->playground = $playground;

        return $this;
    }

    /**
     * Get playground
     *
     * @return boolean 
     */
    public function getPlayground()
    {
        return $this->playground;
    }

    /**
     * Set playgroundForChildren
     *
     * @param boolean $playgroundForChildren
     * @return HotelService
     */
    public function setPlaygroundForChildren($playgroundForChildren)
    {
        $this->playgroundForChildren = $playgroundForChildren;

        return $this;
    }

    /**
     * Get playgroundForChildren
     *
     * @return boolean 
     */
    public function getPlaygroundForChildren()
    {
        return $this->playgroundForChildren;
    }

    /**
     * Set laundry
     *
     * @param boolean $laundry
     * @return HotelService
     */
    public function setLaundry($laundry)
    {
        $this->laundry = $laundry;

        return $this;
    }

    /**
     * Get laundry
     *
     * @return boolean 
     */
    public function getLaundry()
    {
        return $this->laundry;
    }
}

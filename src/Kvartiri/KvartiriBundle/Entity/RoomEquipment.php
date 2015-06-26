<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoomEquipment
 *
 * @ORM\Table("room_equipment")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\RoomEquipmentRepository")
 */
class RoomEquipment
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
     * @ORM\Column(name="air_conditioning", type="boolean")
     */
    private $airConditioning;

    /**
     * @var boolean
     *
     * @ORM\Column(name="TV", type="boolean")
     */
    private $tV;

    /**
     * @var boolean
     *
     * @ORM\Column(name="internet", type="boolean")
     */
    private $internet;

    /**
     * @var boolean
     *
     * @ORM\Column(name="kitchenette", type="boolean")
     */
    private $kitchenette;

    /**
     * @var boolean
     *
     * @ORM\Column(name="refrigerator", type="boolean")
     */
    private $refrigerator;

    /**
     * @var boolean
     *
     * @ORM\Column(name="terrace", type="boolean")
     */
    private $terrace;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sea_view", type="boolean")
     */
    private $seaView;

    /**
     * @var boolean
     *
     * @ORM\Column(name="private_bathroom", type="boolean")
     */
    private $privateBathroom;

    /**
     * @var boolean
     *
     * @ORM\Column(name="breakfast", type="boolean")
     */
    private $breakfast;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lunch", type="boolean")
     */
    private $lunch;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dinner", type="boolean")
     */
    private $dinner;



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
     * Set airConditioning
     *
     * @param boolean $airConditioning
     * @return RoomEquipment
     */
    public function setAirConditioning($airConditioning)
    {
        $this->airConditioning = $airConditioning;

        return $this;
    }

    /**
     * Get airConditioning
     *
     * @return boolean 
     */
    public function getAirConditioning()
    {
        return $this->airConditioning;
    }

    /**
     * Set tV
     *
     * @param boolean $tV
     * @return RoomEquipment
     */
    public function setTV($tV)
    {
        $this->tV = $tV;

        return $this;
    }

    /**
     * Get tV
     *
     * @return boolean 
     */
    public function getTV()
    {
        return $this->tV;
    }

    /**
     * Set internet
     *
     * @param boolean $internet
     * @return RoomEquipment
     */
    public function setInternet($internet)
    {
        $this->internet = $internet;

        return $this;
    }

    /**
     * Get internet
     *
     * @return boolean 
     */
    public function getInternet()
    {
        return $this->internet;
    }

    /**
     * Set kitchenette
     *
     * @param boolean $kitchenette
     * @return RoomEquipment
     */
    public function setKitchenette($kitchenette)
    {
        $this->kitchenette = $kitchenette;

        return $this;
    }

    /**
     * Get kitchenette
     *
     * @return boolean 
     */
    public function getKitchenette()
    {
        return $this->kitchenette;
    }

    /**
     * Set refrigerator
     *
     * @param boolean $refrigerator
     * @return RoomEquipment
     */
    public function setRefrigerator($refrigerator)
    {
        $this->refrigerator = $refrigerator;

        return $this;
    }

    /**
     * Get refrigerator
     *
     * @return boolean 
     */
    public function getRefrigerator()
    {
        return $this->refrigerator;
    }

    /**
     * Set terrace
     *
     * @param boolean $terrace
     * @return RoomEquipment
     */
    public function setTerrace($terrace)
    {
        $this->terrace = $terrace;

        return $this;
    }

    /**
     * Get terrace
     *
     * @return boolean 
     */
    public function getTerrace()
    {
        return $this->terrace;
    }

    /**
     * Set seaView
     *
     * @param boolean $seaView
     * @return RoomEquipment
     */
    public function setSeaView($seaView)
    {
        $this->seaView = $seaView;

        return $this;
    }

    /**
     * Get seaView
     *
     * @return boolean 
     */
    public function getSeaView()
    {
        return $this->seaView;
    }

    /**
     * Set privateBathroom
     *
     * @param boolean $privateBathroom
     * @return RoomEquipment
     */
    public function setPrivateBathroom($privateBathroom)
    {
        $this->privateBathroom = $privateBathroom;

        return $this;
    }

    /**
     * Get privateBathroom
     *
     * @return boolean 
     */
    public function getPrivateBathroom()
    {
        return $this->privateBathroom;
    }

    /**
     * Set breakfast
     *
     * @param boolean $breakfast
     * @return RoomEquipment
     */
    public function setBreakfast($breakfast)
    {
        $this->breakfast = $breakfast;

        return $this;
    }

    /**
     * Get breakfast
     *
     * @return boolean 
     */
    public function getBreakfast()
    {
        return $this->breakfast;
    }

    /**
     * Set lunch
     *
     * @param boolean $lunch
     * @return RoomEquipment
     */
    public function setLunch($lunch)
    {
        $this->lunch = $lunch;

        return $this;
    }

    /**
     * Get lunch
     *
     * @return boolean 
     */
    public function getLunch()
    {
        return $this->lunch;
    }

    /**
     * Set dinner
     *
     * @param boolean $dinner
     * @return RoomEquipment
     */
    public function setDinner($dinner)
    {
        $this->dinner = $dinner;

        return $this;
    }

    /**
     * Get dinner
     *
     * @return boolean 
     */
    public function getDinner()
    {
        return $this->dinner;
    }


}

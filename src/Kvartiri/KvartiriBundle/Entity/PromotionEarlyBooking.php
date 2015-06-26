<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PromotionEarlyBooking
 *
 * @ORM\Table("promotion_early_booking")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\PromotionEarlyBookingRepository")
 */
class PromotionEarlyBooking
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20,nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="days", type="integer",nullable=true)
     */

    private $days;

    /**
     * @var float
     *
     * @ORM\Column(name="Discount", type="float",nullable=true)
     */
    private $discount;


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
     * Set days
     *
     * @param integer $days
     * @return PromotionEarlyBooking
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Get days
     *
     * @return integer 
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return PromotionEarlyBooking
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }


//    public function __toString()
//    {
//        return $this->getName();
//    }

    /**
     * Set name
     *
     * @param string $name
     * @return PromotionEarlyBooking
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
}

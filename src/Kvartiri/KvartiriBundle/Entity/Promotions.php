<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rooms
 *
 * @ORM\Table("promotions")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\PromotionsRepository")
 */
class Promotions
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
     * @ORM\ManyToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Hotels", inversedBy="promotions", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $hotel;


    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\PromotionEarlyBooking", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="promotionfixeddates_id", referencedColumnName="id", nullable=false)
     */
    private $promotionEarlyBooking;


    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\PromotionFixedDates", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $promotionFixedDates;


    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\PromotionGroup", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $promotionGroup;


    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\PromotionMoreNights", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $promotionMoreNights;

    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\PromotionPeriod", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $promotionPeriod;


    /**
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\ReductionChildren", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="reductionchildren_id", referencedColumnName="id", nullable=false)
     */
    private $reductionChildren;









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
     * Set hotel
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Hotels $hotel
     * @return Promotions
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
     * Constructor
     */
    public function __construct()
    {
        $this->promotionEarlyBooking = new \Doctrine\Common\Collections\ArrayCollection();
        $this->promotionFixedDates = new \Doctrine\Common\Collections\ArrayCollection();
        $this->promotionGroup = new \Doctrine\Common\Collections\ArrayCollection();
        $this->promotionMoreNights = new \Doctrine\Common\Collections\ArrayCollection();
        $this->promotionPeriod = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reductionChildren = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add promotionEarlyBooking
     *
     * @param \Kvartiri\KvartiriBundle\Entity\PromotionEarlyBooking $promotionEarlyBooking
     * @return Promotions
     */
    public function addPromotionEarlyBooking(\Kvartiri\KvartiriBundle\Entity\PromotionEarlyBooking $promotionEarlyBooking)
    {
        $this->promotionEarlyBooking[] = $promotionEarlyBooking;

        return $this;
    }

    /**
     * Remove promotionEarlyBooking
     *
     * @param \Kvartiri\KvartiriBundle\Entity\PromotionEarlyBooking $promotionEarlyBooking
     */
    public function removePromotionEarlyBooking(\Kvartiri\KvartiriBundle\Entity\PromotionEarlyBooking $promotionEarlyBooking)
    {
        $this->promotionEarlyBooking->removeElement($promotionEarlyBooking);
    }

    /**
     * Get promotionEarlyBooking
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromotionEarlyBooking()
    {
        return $this->promotionEarlyBooking;
    }

    /**
     * Add promotionFixedDates
     *
     * @param \Kvartiri\KvartiriBundle\Entity\PromotionFixedDates $promotionFixedDates
     * @return Promotions
     */
    public function addPromotionFixedDate(\Kvartiri\KvartiriBundle\Entity\PromotionFixedDates $promotionFixedDates)
    {
        $this->promotionFixedDates[] = $promotionFixedDates;

        return $this;
    }

    /**
     * Remove promotionFixedDates
     *
     * @param \Kvartiri\KvartiriBundle\Entity\PromotionFixedDates $promotionFixedDates
     */
    public function removePromotionFixedDate(\Kvartiri\KvartiriBundle\Entity\PromotionFixedDates $promotionFixedDates)
    {
        $this->promotionFixedDates->removeElement($promotionFixedDates);
    }

    /**
     * Get promotionFixedDates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromotionFixedDates()
    {
        return $this->promotionFixedDates;
    }

    /**
     * Add promotionGroup
     *
     * @param \Kvartiri\KvartiriBundle\Entity\PromotionGroup $promotionGroup
     * @return Promotions
     */
    public function addPromotionGroup(\Kvartiri\KvartiriBundle\Entity\PromotionGroup $promotionGroup)
    {
        $this->promotionGroup[] = $promotionGroup;

        return $this;
    }

    /**
     * Remove promotionGroup
     *
     * @param \Kvartiri\KvartiriBundle\Entity\PromotionGroup $promotionGroup
     */
    public function removePromotionGroup(\Kvartiri\KvartiriBundle\Entity\PromotionGroup $promotionGroup)
    {
        $this->promotionGroup->removeElement($promotionGroup);
    }

    /**
     * Get promotionGroup
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromotionGroup()
    {
        return $this->promotionGroup;
    }

    /**
     * Add promotionMoreNights
     *
     * @param \Kvartiri\KvartiriBundle\Entity\PromotionMoreNights $promotionMoreNights
     * @return Promotions
     */
    public function addPromotionMoreNight(\Kvartiri\KvartiriBundle\Entity\PromotionMoreNights $promotionMoreNights)
    {
        $this->promotionMoreNights[] = $promotionMoreNights;

        return $this;
    }

    /**
     * Remove promotionMoreNights
     *
     * @param \Kvartiri\KvartiriBundle\Entity\PromotionMoreNights $promotionMoreNights
     */
    public function removePromotionMoreNight(\Kvartiri\KvartiriBundle\Entity\PromotionMoreNights $promotionMoreNights)
    {
        $this->promotionMoreNights->removeElement($promotionMoreNights);
    }

    /**
     * Get promotionMoreNights
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromotionMoreNights()
    {
        return $this->promotionMoreNights;
    }

    /**
     * Add promotionPeriod
     *
     * @param \Kvartiri\KvartiriBundle\Entity\PromotionPeriod $promotionPeriod
     * @return Promotions
     */
    public function addPromotionPeriod(\Kvartiri\KvartiriBundle\Entity\PromotionPeriod $promotionPeriod)
    {
        $this->promotionPeriod[] = $promotionPeriod;

        return $this;
    }

    /**
     * Remove promotionPeriod
     *
     * @param \Kvartiri\KvartiriBundle\Entity\PromotionPeriod $promotionPeriod
     */
    public function removePromotionPeriod(\Kvartiri\KvartiriBundle\Entity\PromotionPeriod $promotionPeriod)
    {
        $this->promotionPeriod->removeElement($promotionPeriod);
    }

    /**
     * Get promotionPeriod
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromotionPeriod()
    {
        return $this->promotionPeriod;
    }

    /**
     * Add reductionChildren
     *
     * @param \Kvartiri\KvartiriBundle\Entity\ReductionChildren $reductionChildren
     * @return Promotions
     */
    public function addReductionChild(\Kvartiri\KvartiriBundle\Entity\ReductionChildren $reductionChildren)
    {
        $this->reductionChildren[] = $reductionChildren;

        return $this;
    }

    /**
     * Remove reductionChildren
     *
     * @param \Kvartiri\KvartiriBundle\Entity\ReductionChildren $reductionChildren
     */
    public function removeReductionChild(\Kvartiri\KvartiriBundle\Entity\ReductionChildren $reductionChildren)
    {
        $this->reductionChildren->removeElement($reductionChildren);
    }

    /**
     * Get reductionChildren
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReductionChildren()
    {
        return $this->reductionChildren;
    }
}

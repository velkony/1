<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PromotionFixedDates
 *
 * @ORM\Table("promotion_fixed_dates")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\PromotionFixedDatesRepository")
 */
class PromotionFixedDates
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
     * @var \DateTime
     *
     * @ORM\Column(name="fixedDate", type="datetime",nullable=true)
     */
    private $fixedDate;

    /**
     * @var float
     *
     * @ORM\Column(name="discount", type="float",nullable=true)
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
     * Set fixedDate
     *
     * @param \DateTime $fixedDate
     * @return PromotionFixedDates
     */
    public function setFixedDate($fixedDate)
    {
        $this->fixedDate = $fixedDate;

        return $this;
    }

    /**
     * Get fixedDate
     *
     * @return \DateTime 
     */
    public function getFixedDate()
    {
        return $this->fixedDate;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return PromotionFixedDates
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

}

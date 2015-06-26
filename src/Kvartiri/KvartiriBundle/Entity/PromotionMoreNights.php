<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PromotionMoreNights
 *
 * @ORM\Table("promotion_more_nights")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\PromotionMoreNightsRepository")
 */
class PromotionMoreNights
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
     * @ORM\Column(name="nights", type="integer",nullable=true)
     */
    private $nights;

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
     * Set nights
     *
     * @param integer $nights
     * @return PromotionMoreNights
     */
    public function setNights($nights)
    {
        $this->nights = $nights;

        return $this;
    }

    /**
     * Get nights
     *
     * @return integer 
     */
    public function getNights()
    {
        return $this->nights;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return PromotionMoreNights
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

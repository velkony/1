<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PromotionGroup
 *
 * @ORM\Table("promotion_group")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\PromotionGroupRepository")
 */
class PromotionGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer",nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="people", type="integer",nullable=true)
     */
    private $people;

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
     * Set people
     *
     * @param integer $people
     * @return PromotionGroup
     */
    public function setPeople($people)
    {
        $this->people = $people;

        return $this;
    }

    /**
     * Get people
     *
     * @return integer 
     */
    public function getPeople()
    {
        return $this->people;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return PromotionGroup
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

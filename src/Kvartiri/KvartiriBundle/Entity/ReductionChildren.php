<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReductionChildren
 *
 * @ORM\Table("reduction_children")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\ReductionChildrenRepository")
 */
class ReductionChildren
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
     * @ORM\Column(name="age", type="string", length=25,nullable=true)
     */
    private $age;

    /**
     * @var float
     *
     * @ORM\Column(name="reduction", type="float",nullable=true)
     */
    private $reduction;



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
     * Set age
     *
     * @param string $age
     * @return ReductionChildren
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set reduction
     *
     * @param float $reduction
     * @return ReductionChildren
     */
    public function setReduction($reduction)
    {
        $this->reduction = $reduction;

        return $this;
    }

    /**
     * Get reduction
     *
     * @return float 
     */
    public function getReduction()
    {
        return $this->reduction;
    }


}

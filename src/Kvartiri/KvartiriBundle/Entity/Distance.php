<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Distance
 *
 * @ORM\Table("distance")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\DistanceRepository")
 */
class Distance
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
     * @var float
     *
     * @ORM\Column(name="d1", type="float")
     */
    private $d1;

    /**
     * @var float
     *
     * @ORM\Column(name="d2", type="float")
     */
    private $d2;

    /**
     * @var float
     *
     * @ORM\Column(name="d3", type="float")
     */
    private $d3;

    /**
     * @var float
     *
     * @ORM\Column(name="d4", type="float")
     */
    private $d4;


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
     * Set d1
     *
     * @param float $d1
     * @return Distance
     */
    public function setD1($d1)
    {
        $this->d1 = $d1;

        return $this;
    }

    /**
     * Get d1
     *
     * @return float 
     */
    public function getD1()
    {
        return $this->d1;
    }

    /**
     * Set d2
     *
     * @param float $d2
     * @return Distance
     */
    public function setD2($d2)
    {
        $this->d2 = $d2;

        return $this;
    }

    /**
     * Get d2
     *
     * @return float 
     */
    public function getD2()
    {
        return $this->d2;
    }

    /**
     * Set d3
     *
     * @param float $d3
     * @return Distance
     */
    public function setD3($d3)
    {
        $this->d3 = $d3;

        return $this;
    }

    /**
     * Get d3
     *
     * @return float 
     */
    public function getD3()
    {
        return $this->d3;
    }

    /**
     * Set d4
     *
     * @param float $d4
     * @return Distance
     */
    public function setD4($d4)
    {
        $this->d4 = $d4;

        return $this;
    }

    /**
     * Get d4
     *
     * @return float 
     */
    public function getD4()
    {
        return $this->d4;
    }
}

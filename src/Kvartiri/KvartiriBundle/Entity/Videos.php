<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Videos
 *
 * @ORM\Table("videos")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\VideosRepository")
 */
class Videos
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
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     * @ORM\ManyToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Hotels", inversedBy="videos", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $hotel;
    

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
     * Set path
     *
     * @param string $path
     * @return Videos
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Videos
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set hotel
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Hotels $hotel
     * @return Videos
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
}

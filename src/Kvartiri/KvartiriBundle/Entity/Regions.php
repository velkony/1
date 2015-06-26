<?php

namespace Kvartiri\KvartiriBundle\Entity;



use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;


/**
 * Regions
 *
 * @ORM\Table("regions")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\RegionsRepository")
 */
class Regions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    public function __construct()
    {
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hotels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=125)
     */
    private $name;


    /**
     * @ORM\OneToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\Cities", mappedBy="region", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $cities;

    public function __toString()
    {
        return $this->getName();
    }



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
     * Set name
     *
     * @param string $name
     * @return Regions
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

    /**
     * Add cities
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Cities $cities
     * @return Regions
     */
    public function addCity(\Kvartiri\KvartiriBundle\Entity\Cities $cities)
    {
        $this->cities[] = $cities;

        return $this;
    }

    /**
     * Remove cities
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Cities $cities
     */
    public function removeCity(\Kvartiri\KvartiriBundle\Entity\Cities $cities)
    {
        $this->cities->removeElement($cities);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCities()
    {
        return $this->cities;
    }

}

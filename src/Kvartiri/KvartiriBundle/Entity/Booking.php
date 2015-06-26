<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table("booking")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\BookingRepository")
 */
class Booking
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
     * @ORM\ManyToMany(targetEntity="Kvartiri\KvartiriBundle\Entity\Selection", mappedBy="booking", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $selection;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->selection = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add selection
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Selection $selection
     * @return Booking
     */
    public function addSelection(\Kvartiri\KvartiriBundle\Entity\Selection $selection)
    {
        $this->selection[] = $selection;
        $selection->addBooking($this);

        return $this;
    }

    /**
     * Remove selection
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Selection $selection
     */
    public function removeSelection(\Kvartiri\KvartiriBundle\Entity\Selection $selection)
    {
        $this->selection->removeElement($selection);
    }

    /**
     * Get selection
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSelection()
    {
        return $this->selection;
    }
}

<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoomTypes
 *
 * @ORM\Table("room_types")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\RoomTypesRepository")
 */
class RoomTypes
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
     * @ORM\Column(name="nameTypeEn", type="string", length=25)
     */
    private $nameTypeEn;




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
     * Set nameTypeEn
     *
     * @param string $nameTypeEn
     * @return RoomTypes
     */
    public function setNameTypeEn($nameTypeEn)
    {
        $this->nameTypeEn = $nameTypeEn;

        return $this;
    }

    /**
     * Get nameTypeEn
     *
     * @return string
     */
    public function getNameTypeEn()
    {
        return $this->nameTypeEn;
    }

    public function __toString()
    {
        return $this->getNameTypeEn();
    }
}

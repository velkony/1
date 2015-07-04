<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FavoritesHotels
 *
 * @ORM\Table("favorites_hotels")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\FavoritesHotelsRepository")
 */
class FavoritesHotels
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

//    /**
//     * @ORM\ManyToOne(targetEntity="Users\UsersBundle\Entity\Users", inversedBy="favoritesHotels")
//     * @ORM\JoinColumn(nullable=true)
//     */
//
//    private $user;


    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */

    private $user;


    /**
     * @var array
     *
     * @ORM\Column(name="favorite_hotel", type="array")
     */
    private $favoriteHotel;


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
     * Set favoriteHotel
     *
     * @param array $favoriteHotel
     * @return FavoritesHotels
     */
    public function setFavoriteHotel($favoriteHotel)
    {
        $this->favoriteHotel = $favoriteHotel;

        return $this;
    }

    /**
     * Get favoriteHotel
     *
     * @return array 
     */
    public function getFavoriteHotel()
    {
        return $this->favoriteHotel;
    }


    /**
     * Set user
     *
     * @param integer $user
     * @return FavoritesHotels
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }
}

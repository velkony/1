<?php

namespace Users\UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientsRequests
 *
 * @ORM\Table("clients_requests")
 * @ORM\Entity(repositoryClass="Users\UsersBundle\Repository\ClientsRequestsRepository")
 */
class ClientsRequests
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
     * @ORM\Column(name="dateRequest", type="datetime")
     */
    private $dateRequest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="checkIn", type="datetime")
     */
    private $checkIn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="checkOut", type="datetime")
     */
    private $checkOut;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberNights", type="integer", nullable=true)
     */
    private $numberNights;

    /**
     * @var integer
     *
     * @ORM\Column(name="hotelId", type="integer", nullable=true)
     */
    private $hotelId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="breakfast", type="boolean", nullable=true)
     */
    private $breakfast;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lunch", type="boolean", nullable=true)
     */
    private $lunch;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dinner", type="boolean", nullable=true)
     */
    private $dinner;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=125, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=125, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="gsm", type="string", length=20, nullable=true)
     */
    private $gsm;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=125, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=20, nullable=true)
     */
    private $fax;

    /**
     * @ORM\ManyToMany(targetEntity="Users\UsersBundle\Entity\RoomsRequests", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $roomsRequests;
    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roomsRequests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set dateRequest
     *
     * @param \DateTime $dateRequest
     * @return ClientsRequests
     */
    public function setDateRequest($dateRequest)
    {
        $this->dateRequest = $dateRequest;

        return $this;
    }

    /**
     * Get dateRequest
     *
     * @return \DateTime 
     */
    public function getDateRequest()
    {
        return $this->dateRequest;
    }

    /**
     * Set checkIn
     *
     * @param \DateTime $checkIn
     * @return ClientsRequests
     */
    public function setCheckIn($checkIn)
    {
        $this->checkIn = $checkIn;

        return $this;
    }

    /**
     * Get checkIn
     *
     * @return \DateTime
     */
    public function getCheckIn()
    {
        return $this->checkIn;
    }

    /**
     * Set checkOut
     *
     * @param \DateTime $checkOut
     * @return ClientsRequests
     */
    public function setCheckOut($checkOut)
    {
        $this->checkOut = $checkOut;

        return $this;
    }

    /**
     * Get checkOut
     *
     * @return \DateTime
     */
    public function getCheckOut()
    {
        return $this->checkOut;
    }

    /**
     * Set numberNights
     *
     * @param integer $numberNights
     * @return ClientsRequests
     */
    public function setNumberNights($numberNights)
    {
        $this->numberNights = $numberNights;

        return $this;
    }

    /**
     * Get numberNights
     *
     * @return integer 
     */
    public function getNumberNights()
    {
        return $this->numberNights;
    }

    /**
     * Set hotelId
     *
     * @param integer $hotelId
     * @return ClientsRequests
     */
    public function setHotelId($hotelId)
    {
        $this->hotelId = $hotelId;

        return $this;
    }

    /**
     * Get hotelId
     *
     * @return integer 
     */
    public function getHotelId()
    {
        return $this->hotelId;
    }

    /**
     * Set breakfast
     *
     * @param boolean $breakfast
     * @return ClientsRequests
     */
    public function setBreakfast($breakfast)
    {
        $this->breakfast = $breakfast;

        return $this;
    }

    /**
     * Get breakfast
     *
     * @return boolean 
     */
    public function getBreakfast()
    {
        return $this->breakfast;
    }

    /**
     * Set lunch
     *
     * @param boolean $lunch
     * @return ClientsRequests
     */
    public function setLunch($lunch)
    {
        $this->lunch = $lunch;

        return $this;
    }

    /**
     * Get lunch
     *
     * @return boolean 
     */
    public function getLunch()
    {
        return $this->lunch;
    }

    /**
     * Set dinner
     *
     * @param boolean $dinner
     * @return ClientsRequests
     */
    public function setDinner($dinner)
    {
        $this->dinner = $dinner;

        return $this;
    }

    /**
     * Get dinner
     *
     * @return boolean 
     */
    public function getDinner()
    {
        return $this->dinner;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return ClientsRequests
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ClientsRequests
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
     * Set gsm
     *
     * @param string $gsm
     * @return ClientsRequests
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;

        return $this;
    }

    /**
     * Get gsm
     *
     * @return string 
     */
    public function getGsm()
    {
        return $this->gsm;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ClientsRequests
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return ClientsRequests
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Add roomsRequests
     *
     * @param \Users\UsersBundle\Entity\RoomsRequests $roomsRequests
     * @return ClientsRequests
     */
    public function addRoomsRequest(\Users\UsersBundle\Entity\RoomsRequests $roomsRequests)
    {
        $this->roomsRequests[] = $roomsRequests;

        return $this;
    }

    /**
     * Remove roomsRequests
     *
     * @param \Users\UsersBundle\Entity\RoomsRequests $roomsRequests
     */
    public function removeRoomsRequest(\Users\UsersBundle\Entity\RoomsRequests $roomsRequests)
    {
        $this->roomsRequests->removeElement($roomsRequests);
    }

    /**
     * Get roomsRequests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoomsRequests()
    {
        return $this->roomsRequests;
    }
}

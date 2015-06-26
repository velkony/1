<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company_Hotels
 *
 * @ORM\Table("company_hotels")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\CompanyHotelsRepository")
 */
class CompanyHotels
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
     * @ORM\ManyToOne(targetEntity="Kvartiri\KvartiriBundle\Entity\Companies", inversedBy="companyHotels", cascade={"persist", "merge"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $hotelsCompany;




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
     * Set hotelsCompany
     *
     * @param \Kvartiri\KvartiriBundle\Entity\Companies $hotelsCompany
     * @return Company_Hotels
     */
    public function setHotelsCompany(\Kvartiri\KvartiriBundle\Entity\Companies $hotelsCompany = null)
    {
        $this->hotelsCompany = $hotelsCompany;

        return $this;
    }

    /**
     * Get hotelsCompany
     *
     * @return \Kvartiri\KvartiriBundle\Entity\Companies 
     */
    public function getHotelsCompany()
    {
        return $this->hotelsCompany;
    }
}

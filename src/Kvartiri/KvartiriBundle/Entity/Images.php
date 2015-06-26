<?php

namespace Kvartiri\KvartiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Images
 *
 * @ORM\Table("images")
 * @ORM\Entity(repositoryClass="Kvartiri\KvartiriBundle\Repository\ImagesRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Images
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
     * @ORM\COlumn(name="updated_at",type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\PostLoad()
     */
    public function postLoad()
    {
        $this->updateAt = new \DateTime();
    }

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     */
    public $alt;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    public $path;

    /**
     * @Assert\File(maxSize="6000000")
     */

    public $file;

    public function getUploadRootDir()
    {
        return __dir__.'/../../../../web/uploads';
    }

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getAssetPath()
    {
        return 'uploads/'.$this->path;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function preUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
        $this->oldFile = $this->getPath();
        $this->updateAt = new \DateTime();

        if (null !== $this->file)
            $this->path = sha1(uniqid(mt_rand(),true)).'.'.$this->file->guessExtension();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null !== $this->file) {
            $this->file->move($this->getUploadRootDir(),$this->path);
            unset($this->file);

            if ($this->oldFile != null) unlink($this->tempFile);
        }
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (file_exists($this->tempFile)) unlink($this->tempFile);
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

    public function getPath()
    {
        return $this->path;
    }

    public function getAlt()
    {
        return $this->alt;
    }


    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Images
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Images
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Images
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }
}

<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MPlatform
 *
 * @ORM\Table(name="m_platform", uniqueConstraints={@ORM\UniqueConstraint(name="platform_name", columns={"platform_name"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MPlatformRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class MPlatform
{
    /**
     * @var integer
     *
     * @ORM\Column(name="platform_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $platformId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\TMarketProduct", mappedBy="platform", cascade={"persist"})
     */
    protected $TMarketProduct_platform;

    /**
     * @var string
     *
     * @ORM\Column(name="platform_name", type="string", length=30, nullable=false)
     */
    protected $platformName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false)
     */
    protected $isDeleted = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="create_user_id", type="integer", nullable=false)
     */
    protected $createUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="datetime", nullable=false)
     */
    protected $createTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="update_user_id", type="integer", nullable=false)
     */
    protected $updateUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_time", type="datetime", nullable=false)
     */
    protected $updateTime = 'CURRENT_TIMESTAMP';



    /**
     * Get platformId
     *
     * @return integer
     */
    public function getPlatformId()
    {
        return $this->platformId;
    }

    /**
     * Set platformName
     *
     * @param string $platformName
     *
     * @return MPlatform
     */
    public function setPlatformName($platformName)
    {
        $this->platformName = $platformName;

        return $this;
    }

    /**
     * Get platformName
     *
     * @return string
     */
    public function getPlatformName()
    {
        return $this->platformName;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MPlatform
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set createUserId
     *
     * @param integer $createUserId
     *
     * @return MPlatform
     */
    public function setCreateUserId($createUserId)
    {
        $this->createUserId = $createUserId;

        return $this;
    }

    /**
     * Get createUserId
     *
     * @return integer
     */
    public function getCreateUserId()
    {
        return $this->createUserId;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return MPlatform
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set updateUserId
     *
     * @param integer $updateUserId
     *
     * @return MPlatform
     */
    public function setUpdateUserId($updateUserId)
    {
        $this->updateUserId = $updateUserId;

        return $this;
    }

    /**
     * Get updateUserId
     *
     * @return integer
     */
    public function getUpdateUserId()
    {
        return $this->updateUserId;
    }

    /**
     * Set updateTime
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate
     *
     * @return MPlatform
     */
    public function setUpdateTime()
    {
        $this->updateTime = new \DateTime();

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return \DateTime
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->TMarketProduct_platform = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tMarketProductPlatform
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductPlatform
     *
     * @return MPlatform
     */
    public function addTMarketProductPlatform(\GDI\Entity\TMarketProduct $tMarketProductPlatform)
    {
        $this->TMarketProduct_platform[] = $tMarketProductPlatform;

        return $this;
    }

    /**
     * Remove tMarketProductPlatform
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductPlatform
     */
    public function removeTMarketProductPlatform(\GDI\Entity\TMarketProduct $tMarketProductPlatform)
    {
        $this->TMarketProduct_platform->removeElement($tMarketProductPlatform);
    }

    /**
     * Get tMarketProductPlatform
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTMarketProductPlatform()
    {
        return $this->TMarketProduct_platform;
    }
}

<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MJurisdiction
 *
 * @ORM\Table(name="m_jurisdiction", uniqueConstraints={@ORM\UniqueConstraint(name="jurisdiction_name", columns={"jurisdiction_name"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MJurisdictionRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015

 */
class MJurisdiction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="jurisdiction_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $jurisdictionId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\RMarketJurisdiction", mappedBy="jurisdiction", cascade={"persist"})
     */
    protected $RMarketJurisdiction_jurisdiction;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\TJurisdictionProduct", mappedBy="jurisdiction", cascade={"persist"})
     */
    protected $TJurisdictionProduct_jurisdiction;

    /**
     * @var string
     *
     * @ORM\Column(name="jurisdiction_name", type="string", length=30, nullable=false)
     */
    protected $jurisdictionName;

    /**
     * @var string
     *
     * @ORM\Column(name="jurisdiction_abbr", type="string", length=4, nullable=false)
     */
    protected $jurisdictionAbbr;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_regulator", type="boolean", nullable=false)
     */
    protected $isRegulator = '0';

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
     * Get jurisdictionId
     *
     * @return integer
     */
    public function getJurisdictionId()
    {
        return $this->jurisdictionId;
    }

    /**
     * Set jurisdictionName
     *
     * @param string $jurisdictionName
     *
     * @return MJurisdiction
     */
    public function setJurisdictionName($jurisdictionName)
    {
        $this->jurisdictionName = $jurisdictionName;

        return $this;
    }

    /**
     * Get jurisdictionName
     *
     * @return string
     */
    public function getJurisdictionName()
    {
        return $this->jurisdictionName;
    }

    /**
     * Set jurisdictionAbbr
     *
     * @param string $jurisdictionAbbr
     *
     * @return MJurisdiction
     */
    public function setJurisdictionAbbr($jurisdictionAbbr)
    {
        $this->jurisdictionAbbr = $jurisdictionAbbr;

        return $this;
    }

    /**
     * Get jurisdictionAbbr
     *
     * @return string
     */
    public function getJurisdictionAbbr()
    {
        return $this->jurisdictionAbbr;
    }

    /**
     * Set isRegulator
     *
     * @param boolean $isRegulator
     *
     * @return MJurisdiction
     */
    public function setIsRegulator($isRegulator)
    {
        $this->isRegulator = $isRegulator;

        return $this;
    }

    /**
     * Get isRegulator
     *
     * @return boolean
     */
    public function getIsRegulator()
    {
        return $this->isRegulator;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MJurisdiction
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
     * @return MJurisdiction
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
     * @return MJurisdiction
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
     * @return MJurisdiction
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
     * @return MJurisdiction
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
        $this->RMarketJurisdiction_jurisdiction = new \Doctrine\Common\Collections\ArrayCollection();
        $this->TJurisdictionProduct_jurisdiction = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rMarketJurisdictionJurisdiction
     *
     * @param \GDI\Entity\RMarketJurisdiction $rMarketJurisdictionJurisdiction
     *
     * @return MJurisdiction
     */
    public function addRMarketJurisdictionJurisdiction(\GDI\Entity\RMarketJurisdiction $rMarketJurisdictionJurisdiction)
    {
        $this->RMarketJurisdiction_jurisdiction[] = $rMarketJurisdictionJurisdiction;

        return $this;
    }

    /**
     * Remove rMarketJurisdictionJurisdiction
     *
     * @param \GDI\Entity\RMarketJurisdiction $rMarketJurisdictionJurisdiction
     */
    public function removeRMarketJurisdictionJurisdiction(\GDI\Entity\RMarketJurisdiction $rMarketJurisdictionJurisdiction)
    {
        $this->RMarketJurisdiction_jurisdiction->removeElement($rMarketJurisdictionJurisdiction);
    }

    /**
     * Get rMarketJurisdictionJurisdiction
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRMarketJurisdictionJurisdiction()
    {
        return $this->RMarketJurisdiction_jurisdiction;
    }

    /**
     * Add tJurisdictionProductJurisdiction
     *
     * @param \GDI\Entity\TJurisdictionProduct $tJurisdictionProductJurisdiction
     *
     * @return MJurisdiction
     */
    public function addTJurisdictionProductJurisdiction(\GDI\Entity\TJurisdictionProduct $tJurisdictionProductJurisdiction)
    {
        $this->TJurisdictionProduct_jurisdiction[] = $tJurisdictionProductJurisdiction;

        return $this;
    }

    /**
     * Remove tJurisdictionProductJurisdiction
     *
     * @param \GDI\Entity\TJurisdictionProduct $tJurisdictionProductJurisdiction
     */
    public function removeTJurisdictionProductJurisdiction(\GDI\Entity\TJurisdictionProduct $tJurisdictionProductJurisdiction)
    {
        $this->TJurisdictionProduct_jurisdiction->removeElement($tJurisdictionProductJurisdiction);
    }

    /**
     * Get tJurisdictionProductJurisdiction
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTJurisdictionProductJurisdiction()
    {
        return $this->TJurisdictionProduct_jurisdiction;
    }
}

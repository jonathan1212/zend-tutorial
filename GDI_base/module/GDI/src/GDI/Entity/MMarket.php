<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MMarket
 *
 * @ORM\Table(name="m_market", uniqueConstraints={@ORM\UniqueConstraint(name="market_name", columns={"market_name"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MMarketRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class MMarket
{
    /**
     * @var integer
     *
     * @ORM\Column(name="market_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $marketId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\TMarketProduct", mappedBy="market", cascade={"persist"})
     */
    protected $TMarketProduct_market;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\RMarketJurisdiction", mappedBy="market", cascade={"persist"})
     */
    protected $RMarketJurisdiction_market;

    /**
     * @var string
     *
     * @ORM\Column(name="market_name", type="string", length=30, nullable=false)
     */
    protected $marketName;

    /**
     * @var string
     *
     * @ORM\Column(name="market_abbr", type="string", length=30, nullable=false)
     */
    protected $marketAbbr;

    /**
     * @var string
     *
     * @ORM\Column(name="criterion_jurisdiction_id", type="string", length=11, nullable=false)
     */
    protected $criterionJurisdictionId;

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
     * Get marketId
     *
     * @return integer
     */
    public function getMarketId()
    {
        return $this->marketId;
    }

    /**
     * Set marketName
     *
     * @param string $marketName
     *
     * @return MMarket
     */
    public function setMarketName($marketName)
    {
        $this->marketName = $marketName;

        return $this;
    }

    /**
     * Get marketName
     *
     * @return string
     */
    public function getMarketName()
    {
        return $this->marketName;
    }

    /**
     * Set marketAbbr
     *
     * @param string $marketAbbr
     *
     * @return MMarket
     */
    public function setMarketAbbr($marketAbbr)
    {
        $this->marketAbbr = $marketAbbr;

        return $this;
    }

    /**
     * Get marketAbbr
     *
     * @return string
     */
    public function getMarketAbbr()
    {
        return $this->marketAbbr;
    }

    /**
     * Set criterionJurisdictionId
     *
     * @param string $criterionJurisdictionId
     *
     * @return MMarket
     */
    public function setCriterionJurisdictionId($criterionJurisdictionId)
    {
        $this->criterionJurisdictionId = $criterionJurisdictionId;

        return $this;
    }

    /**
     * Get criterionJurisdictionId
     *
     * @return string
     */
    public function getCriterionJurisdictionId()
    {
        return $this->criterionJurisdictionId;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MMarket
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
     * @return MMarket
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
     * @return MMarket
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
     * @return MMarket
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
     * @return MMarket
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
        $this->TMarketProduct_market = new \Doctrine\Common\Collections\ArrayCollection();
        $this->RMarketJurisdiction_market = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tMarketProductMarket
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductMarket
     *
     * @return MMarket
     */
    public function addTMarketProductMarket(\GDI\Entity\TMarketProduct $tMarketProductMarket)
    {
        $this->TMarketProduct_market[] = $tMarketProductMarket;

        return $this;
    }

    /**
     * Remove tMarketProductMarket
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductMarket
     */
    public function removeTMarketProductMarket(\GDI\Entity\TMarketProduct $tMarketProductMarket)
    {
        $this->TMarketProduct_market->removeElement($tMarketProductMarket);
    }

    /**
     * Get tMarketProductMarket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTMarketProductMarket()
    {
        return $this->TMarketProduct_market;
    }

    /**
     * Add rMarketJurisdictionMarket
     *
     * @param \GDI\Entity\RMarketJurisdiction $rMarketJurisdictionMarket
     *
     * @return MMarket
     */
    public function addRMarketJurisdictionMarket(\GDI\Entity\RMarketJurisdiction $rMarketJurisdictionMarket)
    {
        $this->RMarketJurisdiction_market[] = $rMarketJurisdictionMarket;

        return $this;
    }

    /**
     * Remove rMarketJurisdictionMarket
     *
     * @param \GDI\Entity\RMarketJurisdiction $rMarketJurisdictionMarket
     */
    public function removeRMarketJurisdictionMarket(\GDI\Entity\RMarketJurisdiction $rMarketJurisdictionMarket)
    {
        $this->RMarketJurisdiction_market->removeElement($rMarketJurisdictionMarket);
    }

    /**
     * Get rMarketJurisdictionMarket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRMarketJurisdictionMarket()
    {
        return $this->RMarketJurisdiction_market;
    }
}

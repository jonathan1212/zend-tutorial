<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 * RMarketJurisdiction
 *
 * @ORM\Table(name="r_market_jurisdiction", indexes={@ORM\Index(name="r_market_jurisdiction_fi1", columns={"market_id"}), @ORM\Index(name="r_market_jurisdiction_fi2", columns={"jurisdiction_id"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\RMarketJurisdictionRepository")
 *
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("RMarketJurisdiction")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ClassMethods")

 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class RMarketJurisdiction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MMarket", inversedBy="RMarketJurisdiction_market", cascade={"persist"})
     * @ORM\JoinColumn(name="market_id", referencedColumnName="market_id", unique=false, nullable=false)
     */
    protected $market;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MJurisdiction", inversedBy="RMarketJurisdiction_jurisdiction", cascade={"persist"})
     * @ORM\JoinColumn(name="jurisdiction_id", referencedColumnName="jurisdiction_id", unique=false, nullable=false)
     */
    protected $jurisdiction;

    /**
     * @var integer
     *
     * @ORM\Column(name="market_id", type="integer", nullable=false)
     */
    protected $marketId;

    /**
     * @var integer
     *
     * @ORM\Column(name="jurisdiction_id", type="integer", nullable=false)
     */
    protected $jurisdictionId;

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
     * Set marketId
     *
     * @param integer $marketId
     *
     * @return RMarketJurisdiction
     */
    public function setMarketId($marketId)
    {
        $this->marketId = $marketId;

        return $this;
    }

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
     * Set jurisdictionId
     *
     * @param integer $jurisdictionId
     *
     * @return RMarketJurisdiction
     */
    public function setJurisdictionId($jurisdictionId)
    {
        $this->jurisdictionId = $jurisdictionId;

        return $this;
    }

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
     * Set market
     *
     * @param \GDI\Entity\MMarket $market
     *
     * @return RMarketJurisdiction
     */
    public function setMarket(\GDI\Entity\MMarket $market)
    {
        $this->market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return \GDI\Entity\MMarket
     */
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * Set jurisdiction
     *
     * @param \GDI\Entity\MJurisdiction $jurisdiction
     *
     * @return RMarketJurisdiction
     */
    public function setJurisdiction(\GDI\Entity\MJurisdiction $jurisdiction)
    {
        $this->jurisdiction = $jurisdiction;

        return $this;
    }

    /**
     * Get jurisdiction
     *
     * @return \GDI\Entity\MJurisdiction
     */
    public function getJurisdiction()
    {
        return $this->jurisdiction;
    }



}

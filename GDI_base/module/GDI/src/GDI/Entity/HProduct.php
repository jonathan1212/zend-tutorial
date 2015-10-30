<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HProduct
 *
 * @ORM\Table(name="h_product")
 * @ORM\Entity(repositoryClass="GDI\Repository\HProductRepository")
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class HProduct
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
     * @var integer
     *
     * @ORM\Column(name="jurisdiction_product_id", type="integer", nullable=false)
     */
    protected $jurisdictionProductId;

    /**
     * @var integer
     *
     * @ORM\Column(name="history", type="integer", nullable=false)
     */
    protected $history;



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
     * Set jurisdictionProductId
     *
     * @param integer $jurisdictionProductId
     *
     * @return HProduct
     */
    public function setJurisdictionProductId($jurisdictionProductId)
    {
        $this->jurisdictionProductId = $jurisdictionProductId;

        return $this;
    }

    /**
     * Get jurisdictionProductId
     *
     * @return integer
     */
    public function getJurisdictionProductId()
    {
        return $this->jurisdictionProductId;
    }

    /**
     * Set history
     *
     * @param integer $history
     *
     * @return HProduct
     */
    public function setHistory($history)
    {
        $this->history = $history;

        return $this;
    }

    /**
     * Get history
     *
     * @return integer
     */
    public function getHistory()
    {
        return $this->history;
    }
}

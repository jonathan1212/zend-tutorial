<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WProduct
 *
 * @ORM\Table(name="w_product", uniqueConstraints={@ORM\UniqueConstraint(name="control_id", columns={"control_id"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\WProductRepository")
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class WProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="control_id", type="string", length=20, nullable=false)
     */
    protected $controlId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_artwork_sp_date", type="date", nullable=true)
     */
    protected $eArtworkSpDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_artwork_sp_date", type="date", nullable=true)
     */
    protected $rArtworkSpDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_gslick_date", type="date", nullable=true)
     */
    protected $eGslickDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_gslick_date", type="date", nullable=true)
     */
    protected $rGslickDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_demo_date", type="date", nullable=true)
     */
    protected $eDemoDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_demo_date", type="date", nullable=true)
     */
    protected $rDemoDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_movie_date", type="date", nullable=true)
     */
    protected $eMovieDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_movie_date", type="date", nullable=true)
     */
    protected $rMovieDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_artwork_tr_date", type="date", nullable=true)
     */
    protected $eArtworkTrDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_artwork_tr_date", type="date", nullable=true)
     */
    protected $rArtworkTrDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_website_date", type="date", nullable=true)
     */
    protected $eWebsiteDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_website_date", type="date", nullable=true)
     */
    protected $rWebsiteDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_return_demo", type="boolean", nullable=false)
     */
    protected $isReturnDemo = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="game_image_pass", type="string", length=100, nullable=true)
     */
    protected $gameImagePass;

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
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set controlId
     *
     * @param string $controlId
     *
     * @return WProduct
     */
    public function setControlId($controlId)
    {
        $this->controlId = $controlId;

        return $this;
    }

    /**
     * Get controlId
     *
     * @return string
     */
    public function getControlId()
    {
        return $this->controlId;
    }

    /**
     * Set eArtworkSpDate
     *
     * @param \DateTime $eArtworkSpDate
     *
     * @return WProduct
     */
    public function setEArtworkSpDate($eArtworkSpDate)
    {
        $this->eArtworkSpDate = $eArtworkSpDate;

        return $this;
    }

    /**
     * Get eArtworkSpDate
     *
     * @return \DateTime
     */
    public function getEArtworkSpDate()
    {
        return $this->eArtworkSpDate;
    }

    /**
     * Set rArtworkSpDate
     *
     * @param \DateTime $rArtworkSpDate
     *
     * @return WProduct
     */
    public function setRArtworkSpDate($rArtworkSpDate)
    {
        $this->rArtworkSpDate = $rArtworkSpDate;

        return $this;
    }

    /**
     * Get rArtworkSpDate
     *
     * @return \DateTime
     */
    public function getRArtworkSpDate()
    {
        return $this->rArtworkSpDate;
    }

    /**
     * Set eGslickDate
     *
     * @param \DateTime $eGslickDate
     *
     * @return WProduct
     */
    public function setEGslickDate($eGslickDate)
    {
        $this->eGslickDate = $eGslickDate;

        return $this;
    }

    /**
     * Get eGslickDate
     *
     * @return \DateTime
     */
    public function getEGslickDate()
    {
        return $this->eGslickDate;
    }

    /**
     * Set rGslickDate
     *
     * @param \DateTime $rGslickDate
     *
     * @return WProduct
     */
    public function setRGslickDate($rGslickDate)
    {
        $this->rGslickDate = $rGslickDate;

        return $this;
    }

    /**
     * Get rGslickDate
     *
     * @return \DateTime
     */
    public function getRGslickDate()
    {
        return $this->rGslickDate;
    }

    /**
     * Set eDemoDate
     *
     * @param \DateTime $eDemoDate
     *
     * @return WProduct
     */
    public function setEDemoDate($eDemoDate)
    {
        $this->eDemoDate = $eDemoDate;

        return $this;
    }

    /**
     * Get eDemoDate
     *
     * @return \DateTime
     */
    public function getEDemoDate()
    {
        return $this->eDemoDate;
    }

    /**
     * Set rDemoDate
     *
     * @param \DateTime $rDemoDate
     *
     * @return WProduct
     */
    public function setRDemoDate($rDemoDate)
    {
        $this->rDemoDate = $rDemoDate;

        return $this;
    }

    /**
     * Get rDemoDate
     *
     * @return \DateTime
     */
    public function getRDemoDate()
    {
        return $this->rDemoDate;
    }

    /**
     * Set eMovieDate
     *
     * @param \DateTime $eMovieDate
     *
     * @return WProduct
     */
    public function setEMovieDate($eMovieDate)
    {
        $this->eMovieDate = $eMovieDate;

        return $this;
    }

    /**
     * Get eMovieDate
     *
     * @return \DateTime
     */
    public function getEMovieDate()
    {
        return $this->eMovieDate;
    }

    /**
     * Set rMovieDate
     *
     * @param \DateTime $rMovieDate
     *
     * @return WProduct
     */
    public function setRMovieDate($rMovieDate)
    {
        $this->rMovieDate = $rMovieDate;

        return $this;
    }

    /**
     * Get rMovieDate
     *
     * @return \DateTime
     */
    public function getRMovieDate()
    {
        return $this->rMovieDate;
    }

    /**
     * Set eArtworkTrDate
     *
     * @param \DateTime $eArtworkTrDate
     *
     * @return WProduct
     */
    public function setEArtworkTrDate($eArtworkTrDate)
    {
        $this->eArtworkTrDate = $eArtworkTrDate;

        return $this;
    }

    /**
     * Get eArtworkTrDate
     *
     * @return \DateTime
     */
    public function getEArtworkTrDate()
    {
        return $this->eArtworkTrDate;
    }

    /**
     * Set rArtworkTrDate
     *
     * @param \DateTime $rArtworkTrDate
     *
     * @return WProduct
     */
    public function setRArtworkTrDate($rArtworkTrDate)
    {
        $this->rArtworkTrDate = $rArtworkTrDate;

        return $this;
    }

    /**
     * Get rArtworkTrDate
     *
     * @return \DateTime
     */
    public function getRArtworkTrDate()
    {
        return $this->rArtworkTrDate;
    }

    /**
     * Set eWebsiteDate
     *
     * @param \DateTime $eWebsiteDate
     *
     * @return WProduct
     */
    public function setEWebsiteDate($eWebsiteDate)
    {
        $this->eWebsiteDate = $eWebsiteDate;

        return $this;
    }

    /**
     * Get eWebsiteDate
     *
     * @return \DateTime
     */
    public function getEWebsiteDate()
    {
        return $this->eWebsiteDate;
    }

    /**
     * Set rWebsiteDate
     *
     * @param \DateTime $rWebsiteDate
     *
     * @return WProduct
     */
    public function setRWebsiteDate($rWebsiteDate)
    {
        $this->rWebsiteDate = $rWebsiteDate;

        return $this;
    }

    /**
     * Get rWebsiteDate
     *
     * @return \DateTime
     */
    public function getRWebsiteDate()
    {
        return $this->rWebsiteDate;
    }

    /**
     * Set isReturnDemo
     *
     * @param boolean $isReturnDemo
     *
     * @return WProduct
     */
    public function setIsReturnDemo($isReturnDemo)
    {
        $this->isReturnDemo = $isReturnDemo;

        return $this;
    }

    /**
     * Get isReturnDemo
     *
     * @return boolean
     */
    public function getIsReturnDemo()
    {
        return $this->isReturnDemo;
    }

    /**
     * Set gameImagePass
     *
     * @param string $gameImagePass
     *
     * @return WProduct
     */
    public function setGameImagePass($gameImagePass)
    {
        $this->gameImagePass = $gameImagePass;

        return $this;
    }

    /**
     * Get gameImagePass
     *
     * @return string
     */
    public function getGameImagePass()
    {
        return $this->gameImagePass;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return WProduct
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
     * @return WProduct
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
     * @return WProduct
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
     * @return WProduct
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
     * @param \DateTime $updateTime
     *
     * @return WProduct
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;

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
}

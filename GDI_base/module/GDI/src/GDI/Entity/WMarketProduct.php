<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WMarketProduct
 *
 * @ORM\Table(name="w_market_product")
 * @ORM\Entity(repositoryClass="GDI\Repository\WMarketProductRepository")
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class WMarketProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="market_product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $marketProductId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    protected $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="gvn", type="string", length=30, nullable=true)
     */
    protected $gvn;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     */
    protected $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="platform_id", type="integer", nullable=true)
     */
    protected $platformId;

    /**
     * @var integer
     *
     * @ORM\Column(name="branch_id", type="integer", nullable=true)
     */
    protected $branchId;

    /**
     * @var integer
     *
     * @ORM\Column(name="market_id", type="integer", nullable=false)
     */
    protected $marketId;

    /**
     * @var integer
     *
     * @ORM\Column(name="game_category_id", type="integer", nullable=true)
     */
    protected $gameCategoryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="game_group_id", type="integer", nullable=true)
     */
    protected $gameGroupId;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100, nullable=true)
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="target", type="string", length=100, nullable=true)
     */
    protected $target;

    /**
     * @var string
     *
     * @ORM\Column(name="overview", type="string", length=200, nullable=true)
     */
    protected $overview;

    /**
     * @var string
     *
     * @ORM\Column(name="character", type="string", length=200, nullable=true)
     */
    protected $character;

    /**
     * @var string
     *
     * @ORM\Column(name="remarks", type="text", length=65535, nullable=true)
     */
    protected $remarks;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_dev_start_date", type="date", nullable=true)
     */
    protected $eDevStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_dev_start_date", type="date", nullable=true)
     */
    protected $rDevStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_dev_finish_date", type="date", nullable=true)
     */
    protected $eDevFinishDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_dev_finish_date", type="date", nullable=true)
     */
    protected $rDevFinishDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    protected $isActive = '0';

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
     * Get marketProductId
     *
     * @return integer
     */
    public function getMarketProductId()
    {
        return $this->marketProductId;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return WMarketProduct
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

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
     * Set gvn
     *
     * @param string $gvn
     *
     * @return WMarketProduct
     */
    public function setGvn($gvn)
    {
        $this->gvn = $gvn;

        return $this;
    }

    /**
     * Get gvn
     *
     * @return string
     */
    public function getGvn()
    {
        return $this->gvn;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return WMarketProduct
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set platformId
     *
     * @param integer $platformId
     *
     * @return WMarketProduct
     */
    public function setPlatformId($platformId)
    {
        $this->platformId = $platformId;

        return $this;
    }

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
     * Set branchId
     *
     * @param integer $branchId
     *
     * @return WMarketProduct
     */
    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;

        return $this;
    }

    /**
     * Get branchId
     *
     * @return integer
     */
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * Set marketId
     *
     * @param integer $marketId
     *
     * @return WMarketProduct
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
     * Set gameCategoryId
     *
     * @param integer $gameCategoryId
     *
     * @return WMarketProduct
     */
    public function setGameCategoryId($gameCategoryId)
    {
        $this->gameCategoryId = $gameCategoryId;

        return $this;
    }

    /**
     * Get gameCategoryId
     *
     * @return integer
     */
    public function getGameCategoryId()
    {
        return $this->gameCategoryId;
    }

    /**
     * Set gameGroupId
     *
     * @param integer $gameGroupId
     *
     * @return WMarketProduct
     */
    public function setGameGroupId($gameGroupId)
    {
        $this->gameGroupId = $gameGroupId;

        return $this;
    }

    /**
     * Get gameGroupId
     *
     * @return integer
     */
    public function getGameGroupId()
    {
        return $this->gameGroupId;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return WMarketProduct
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set target
     *
     * @param string $target
     *
     * @return WMarketProduct
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set overview
     *
     * @param string $overview
     *
     * @return WMarketProduct
     */
    public function setOverview($overview)
    {
        $this->overview = $overview;

        return $this;
    }

    /**
     * Get overview
     *
     * @return string
     */
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * Set character
     *
     * @param string $character
     *
     * @return WMarketProduct
     */
    public function setCharacter($character)
    {
        $this->character = $character;

        return $this;
    }

    /**
     * Get character
     *
     * @return string
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     *
     * @return WMarketProduct
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Set eDevStartDate
     *
     * @param \DateTime $eDevStartDate
     *
     * @return WMarketProduct
     */
    public function setEDevStartDate($eDevStartDate)
    {
        $this->eDevStartDate = $eDevStartDate;

        return $this;
    }

    /**
     * Get eDevStartDate
     *
     * @return \DateTime
     */
    public function getEDevStartDate()
    {
        return $this->eDevStartDate;
    }

    /**
     * Set rDevStartDate
     *
     * @param \DateTime $rDevStartDate
     *
     * @return WMarketProduct
     */
    public function setRDevStartDate($rDevStartDate)
    {
        $this->rDevStartDate = $rDevStartDate;

        return $this;
    }

    /**
     * Get rDevStartDate
     *
     * @return \DateTime
     */
    public function getRDevStartDate()
    {
        return $this->rDevStartDate;
    }

    /**
     * Set eDevFinishDate
     *
     * @param \DateTime $eDevFinishDate
     *
     * @return WMarketProduct
     */
    public function setEDevFinishDate($eDevFinishDate)
    {
        $this->eDevFinishDate = $eDevFinishDate;

        return $this;
    }

    /**
     * Get eDevFinishDate
     *
     * @return \DateTime
     */
    public function getEDevFinishDate()
    {
        return $this->eDevFinishDate;
    }

    /**
     * Set rDevFinishDate
     *
     * @param \DateTime $rDevFinishDate
     *
     * @return WMarketProduct
     */
    public function setRDevFinishDate($rDevFinishDate)
    {
        $this->rDevFinishDate = $rDevFinishDate;

        return $this;
    }

    /**
     * Get rDevFinishDate
     *
     * @return \DateTime
     */
    public function getRDevFinishDate()
    {
        return $this->rDevFinishDate;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return WMarketProduct
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return WMarketProduct
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
     * @return WMarketProduct
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
     * @return WMarketProduct
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
     * @return WMarketProduct
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
     * @return WMarketProduct
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

<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 * TMarketProduct
 *
 * @ORM\Table(name="t_market_product", indexes={@ORM\Index(name="t_market_product_fi1", columns={"product_id"}), @ORM\Index(name="t_market_product_fi2", columns={"platform_id"}), @ORM\Index(name="t_market_product_fi3", columns={"branch_id"}), @ORM\Index(name="t_market_product_fi4", columns={"market_id"}), @ORM\Index(name="t_market_product_fi5", columns={"game_category_id"}), @ORM\Index(name="t_market_product_fi6", columns={"game_group_id"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\TMarketProductRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("TMarketProduct")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ClassMethods")
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 *
 */
class TMarketProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="market_product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @Annotation\Type("Zend\Form\Element\Hidden")
     */
    protected $marketProductId;


    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\TJurisdictionProduct", mappedBy="marketProduct", fetch="EXTRA_LAZY", cascade={"persist"})
     */
    protected $TJurisdictionProduct_marketProduct;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MMarket", inversedBy="TMarketProduct_market", cascade={"persist"})
     * @ORM\JoinColumn(name="market_id", referencedColumnName="market_id", unique=false, nullable=false)
     *
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Options({
     *   "required":"true",
     *   "label":"Market",
     *   "empty_option": "Select Market",
     *   "target_class":"GDI\Entity\MMarket",
     *   "property": "marketName"
     * })
     * @Annotation\Attributes({"id":"market", "class": "form-control"})
     */
    protected $market;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MGameCategory", inversedBy="TMarketProduct_gameCategory", cascade={"persist"})
     * @ORM\JoinColumn(name="game_category_id", referencedColumnName="game_category_id", unique=false, nullable=false)
     *
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Options({
     *   "required":"true",
     *   "label":"Category",
     *   "empty_option": "Select Category",
     *   "target_class":"GDI\Entity\MGameCategory",
     *   "property": "gameCategoryName"
     * })
     * @Annotation\Attributes({"id":"category", "class": "form-control"})
     */
    protected $gameCategory;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MBranch", inversedBy="TMarketProduct_branch", cascade={"persist"})
     * @ORM\JoinColumn(name="branch_id", referencedColumnName="branch_id", unique=false, nullable=false)
     *
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Options({
     *   "required":"true",
     *   "label":"Developed in",
     *   "empty_option": "Select Branch",
     *   "target_class":"GDI\Entity\MBranch",
     *   "property": "branchName"
     * })
     * @Annotation\Attributes({"id":"developed-in", "class": "form-control"})
     */
    protected $branch;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\TProduct", inversedBy="TMarketProduct_product", cascade={"persist"})
     * @ORM\JoinColumn(name="product_id", referencedColumnName="product_id", unique=false, nullable=true)
     *
     * @Annotation\ComposedObject("GDI\Entity\TProduct")
     */
    protected $product;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MGameGroup", inversedBy="TMarketProduct_gameGroup", cascade={"persist"})
     * @ORM\JoinColumn(name="game_group_id", referencedColumnName="game_group_id", unique=false, nullable=false)
     *
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Options({
     *   "required":"true",
     *   "label":"Group",
     *   "empty_option": "Select Game Group",
     *   "target_class":"GDI\Entity\MGameGroup",
     *   "property": "gameGroupName"
     * })
     * @Annotation\Attributes({"id":"group", "class": "form-control"})
     */
    protected $gameGroup;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MPlatform", inversedBy="TMarketProduct_platform", cascade={"persist"})
     * @ORM\JoinColumn(name="platform_id", referencedColumnName="platform_id", unique=false, nullable=false)
     *
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Options({
     *   "required":"true",
     *   "label":"Platform",
     *   "empty_option": "Select Platform",
     *   "target_class":"GDI\Entity\MPlatform",
     *   "property": "platformName"
     * })
     * @Annotation\Attributes({"id":"platform", "class": "form-control"})
     */
    protected $platform;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=true)
     */
    protected $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="gvn", type="string", length=30, nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"1", "max":"30"}})
     * @Annotation\Options({"label":"Game Version No"})
     * @Annotation\Attributes({"id":"gdi-no", "class": "form-control"})
     */
    protected $gvn;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(true)
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"1", "max":"100"}})
     * @Annotation\Options({"label":"Title"})
     * @Annotation\Attributes({"id":"title", "class": "form-control"})
     */
    protected $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="platform_id", type="integer", nullable=true)
     *
     * @Annotation\Attributes({"id":"platform", "class": "form-control"})
     */
    protected $platformId;

    /**
     * @var integer
     *
     * @ORM\Column(name="branch_id", type="integer", nullable=true)
     *
     * @Annotation\Attributes({"id":"developed-in", "class": "form-control"})
     */
    protected $branchId;

    /**
     * @var integer
     *
     * @ORM\Column(name="market_id", type="integer", nullable=true)
     *
     * @Annotation\Attributes({"id":"market", "class": "form-control"})
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
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"1", "max":"30"}})
     * @Annotation\Options({"label":"Type"})
     * @Annotation\Attributes({"id":"type", "class": "form-control"})
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="target", type="string", length=100, nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"1", "max":"100"}})
     * @Annotation\Options({"label":"Target"})
     * @Annotation\Attributes({"id":"target", "class": "form-control"})
     */
    protected $target;

    /**
     * @var string
     *
     * @ORM\Column(name="overview", type="string", length=200, nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"1", "max":"200"}})
     * @Annotation\Options({"label":"Overview"})
     * @Annotation\Attributes({"id":"overview", "class": "form-control"})
     */
    protected $overview;

    /**
     * @var string
     *
     * @ORM\Column(name="characteristics", type="string", length=200, nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"1", "max":"200"}})
     * @Annotation\Options({"label":"Characteristics"})
     * @Annotation\Attributes({"id":"character", "class": "form-control"})
     */
    protected $characteristics;

    /**
     * @var string
     *
     * @ORM\Column(name="remarks", type="text", length=65535, nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\TextArea")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"1", "max":"65535"}})
     * @Annotation\Options({"label":"Remarks"})
     * @Annotation\Attributes({"id":"remarks", "class": "form-control"})
     */
    protected $remarks;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_dev_start_date", type="date", nullable=true)
     * 
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Development Start (Estimated)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"dev-st", "class": "form-control"})
     *
     */
    protected $eDevStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_dev_start_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Development Start (Result)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"dev-rs", "class": "form-control"})
     */
    protected $rDevStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_dev_finish_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Development Finish (Estimated)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"dev-st", "class": "form-control"})
     */
    protected $eDevFinishDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_dev_finish_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Development Finish (Result)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"dev-rs", "class": "form-control"})
     */
    protected $rDevFinishDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", columnDefinition="TINYINT DEFAULT 0 NULL")
     *
     * @Annotation\Options({
     *      "label":"Active"
     * })
     *
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     */
    protected $isActive = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", columnDefinition="TINYINT DEFAULT 0 NULL",nullable=true)
     *
     * @Annotation\Required(FALSE)
     * @Annotation\Attributes({"value": 0})
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     */
    protected $isDeleted = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="create_user_id", type="integer", nullable=true)
     */
    protected $createUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="datetime", nullable=true)
     */
    protected $createTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="update_user_id", type="integer", nullable=true)
     */
    protected $updateUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_time", type="datetime", nullable=true)
     */
    protected $updateTime = 'CURRENT_TIMESTAMP';

    /**
     * @var \integer
     *
     * @ORM\Column(name="jurisdiction_product_id", type="integer", nullable=true, options={"default" = 0})
     */
    protected $jurisdictionProductId;

     /**
     * @var \integer
     *
     * @ORM\ManyToOne(targetEntity="GDI\Entity\TJurisdictionProduct", inversedBy="TJurisdictionProduct_jurisdictionProduct", cascade={"persist"})
     * @ORM\JoinColumn(name="jurisdiction_product_id", referencedColumnName="jurisdiction_product_id", unique=false, nullable=true)
     *
     */
    protected $jurisdictionProduct;


    protected $_basePath;

    /**
     * Set productId
     *
     * @param integer $marketProductId
     *
     * @return TMarketProduct
     */

    public function setMarketProductId($marketProductId)
    {
        $this->marketProductId = $marketProductId;

        return $this;
    }

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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @param string $characteristics
     *
     * @return TMarketProduct
     */
    public function setCharacteristics ($characteristics)
    {
        $this->characteristics = $characteristics;

        return $this;
    }

    /**
     * Get character
     *
     * @return string
     */
    public function getCharacteristics()
    {
        return $this->characteristics;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     *
     * @return TMarketProduct
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
     * @return TMarketProduct
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
    public function getEDevStartDate($format='Y-m-d')
    {
        if($this->eDevStartDate instanceof \DateTime){
            return  $this->eDevStartDate->format($format);
        }
        return $this->eDevStartDate;
    }

    /**
     * Set rDevStartDate
     *
     * @param \DateTime $rDevStartDate
     *
     * @return TMarketProduct
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
    public function getRDevStartDate($format='Y-m-d')
    {
        if($this->rDevStartDate instanceof \DateTime){
            return  $this->rDevStartDate->format($format);
        }
        return $this->rDevStartDate;
    }

    /**
     * Set eDevFinishDate
     *
     * @param \DateTime $eDevFinishDate
     *
     * @return TMarketProduct
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
    public function getEDevFinishDate($format='Y-m-d')
    {
        if($this->eDevFinishDate instanceof \DateTime){
            return  $this->eDevFinishDate->format($format);
        }
        return $this->eDevFinishDate;
    }

    /**
     * Set rDevFinishDate
     *
     * @param \DateTime $rDevFinishDate
     *
     * @return TMarketProduct
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
    public function getRDevFinishDate($format='Y-m-d')
    {
        if($this->rDevFinishDate instanceof \DateTime){
            return  $this->rDevFinishDate->format($format);
        }
        return $this->rDevFinishDate;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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
     * @return TMarketProduct
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

     * @return TMarketProduct
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
     * Set market
     *
     * @param \GDI\Entity\MMarket $market
     *
     * @return TMarketProduct
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
     * Set gameCategory
     *
     * @param \GDI\Entity\MGameCategory $gameCategory
     *
     * @return TMarketProduct
     */
    public function setGameCategory(\GDI\Entity\MGameCategory $gameCategory)
    {
        $this->gameCategory = $gameCategory;

        return $this;
    }

    /**
     * Get gameCategory
     *
     * @return \GDI\Entity\MGameCategory
     */
    public function getGameCategory()
    {
        return $this->gameCategory;
    }

    /**
     * Set branch
     *
     * @param \GDI\Entity\MBranch $branch
     *
     * @return TMarketProduct
     */
    public function setBranch(\GDI\Entity\MBranch $branch)
    {
        $this->branch = $branch;

        return $this;
    }

    /**
     * Get branch
     *
     * @return \GDI\Entity\MBranch
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * Set product
     *
     * @param \GDI\Entity\TProduct $product
     *
     * @return TMarketProduct
     */
    public function setProduct(\GDI\Entity\TProduct $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \GDI\Entity\TProduct
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set gameGroup
     *
     * @param \GDI\Entity\MGameGroup $gameGroup
     *
     * @return TMarketProduct
     */
    public function setGameGroup(\GDI\Entity\MGameGroup $gameGroup)
    {
        $this->gameGroup = $gameGroup;

        return $this;
    }

    /**
     * Get gameGroup
     *
     * @return \GDI\Entity\MGameGroup
     */
    public function getGameGroup()
    {
        return $this->gameGroup;
    }

    /**
     * Set platform
     *
     * @param \GDI\Entity\MPlatform $platform
     *
     * @return TMarketProduct
     */
    public function setPlatform(\GDI\Entity\MPlatform $platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return \GDI\Entity\MPlatform
     */
    public function getPlatform()
    {
        return $this->platform;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->TJurisdictionProduct_marketProduct = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tJurisdictionProductMarketProduct
     *
     * @param \GDI\Entity\TJurisdictionProduct $tJurisdictionProductMarketProduct
     *
     * @return TMarketProduct
     */
    public function addTJurisdictionProductMarketProduct(\GDI\Entity\TJurisdictionProduct $tJurisdictionProductMarketProduct)
    {
        $this->TJurisdictionProduct_marketProduct[] = $tJurisdictionProductMarketProduct;

        return $this;
    }

    /**
     * Remove tJurisdictionProductMarketProduct
     *
     * @param \GDI\Entity\TJurisdictionProduct $tJurisdictionProductMarketProduct
     */
    public function removeTJurisdictionProductMarketProduct(\GDI\Entity\TJurisdictionProduct $tJurisdictionProductMarketProduct)
    {
        $this->TJurisdictionProduct_marketProduct->removeElement($tJurisdictionProductMarketProduct);
    }

    /**
     * Get tJurisdictionProductMarketProduct
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTJurisdictionProductMarketProduct()
    {
        return $this->TJurisdictionProduct_marketProduct;
    }

    /**
     * Set jurisdictionProductId
     *
     * @param integer $jurisdictionProductId
     *
     * @return TMarketProduct
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


    public function getApprovalStatus()
    {
        $approved = array();

        foreach ($this->getTJurisdictionProductMarketProduct() as $jp) {
            
            $abbr = $jp->getJurisdiction()->getJurisdictionAbbr();
            $approved[$abbr] = false;

            if ($jp->getRSubmissionDate() ) {
                $approved[$abbr] = true;
            }
        }

        return $approved;
        
    }

    public function getMasterReleaseStatus()
    {
        $approved = array();

        foreach ($this->getTJurisdictionProductMarketProduct() as $jp) {
            
            $abbr = $jp->getJurisdiction()->getJurisdictionAbbr();
            $approved[$abbr] = false;

            if ($jp->getRReleaseDate() ) {
                $approved[$abbr] = true;
            }
        }

        return $approved;
        
    }

    /**
     * [getOneJurisProductByCriterion  Get The criterion of productMarket]
     * @return [TJurisdictionProduct] 
     */
    public function getOneJurisProductByCriterion()
    {
        foreach ($this->getTJurisdictionProductMarketProduct() as $jp) {
            if ($jp->getJurisdictionId() == $this->getMarket()->getCriterionJurisdictionId() )
                return $jp;
        }
        
        return null;   
        
    }

    /**
     * [getSubmission status of submission estimated, result]
     *
     * @return [date] [date of submmission]
     *         [stats] [estimated / done]
     */
    public function getSubmission()
    {
        if (!is_null($jp = $this->getOneJurisProductByCriterion())) {

            return $jp->getSubmissionStatus();
        }

        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getApproval status of approval estimated, result]
     *
     * @return [date] [date of approval]
     *         [stats] [estimated / done]
     */
    public function getApproval()
    {
        if (!is_null($jp = $this->getOneJurisProductByCriterion())) {
            return $jp->getApprovalStatus();
        }

        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getRelease status of master release estimated, result]
     *
     * @return [date] [date of approval]
     *         [stats] [estimated / done]
     */
    public function getRelease()
    {
        if (!is_null($jp = $this->getOneJurisProductByCriterion())) {
            return $jp->getReleaseStatus();
        }

        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getLaunch status of launch estimated, result]
     *
     * @return [date] [date of approval]
     *         [stats] [estimated / done]
     */
    public function getLaunch()
    {
        if (!is_null($jp = $this->getOneJurisProductByCriterion())) {
            return $jp->getLaunchStatus();
        }

        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getRegulator status of regulator estimated, result]
     *
     * @return [date] [date of regulator]
     *         [stats] [estimated / done]
     */
    public function getRegulator()
    {
        if (!is_null($jp = $this->getOneJurisProductByCriterion())) {
            return $jp->getRegulatorStatus();
        }

        return array('date'=>'', 'stats' => '','class'=> '');
    }


    /**
     * [getDevStartStatus status of start development estimated, result]
     *
     * @return [date] [date of development]
     *         [stats] [estimated / done]
     */
    public function getDevStartStatus()
    {
        if ($this->getRDevStartDate()) {
            return array( 'date' => $this->getRDevStartDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getEDevStartDate()) {
            return array('date' => $this->getEDevStartDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getDevFinishStatus status of finish development estimated, result]
     *
     * @return [date] [date of development]
     *         [stats] [estimated / done]
     */
    public function getDevFinishStatus()
    {
        if ($this->getRDevFinishDate()) {
            return array( 'date' => $this->getRDevFinishDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getEDevFinishDate()) {
            return array('date' => $this->getEDevFinishDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * Set jurisdictionProduct
     *
     * @param \GDI\Entity\TJurisdictionProduct $jurisdictionProduct
     *
     * @return TMarketProduct
     */
    public function setJurisdictionProduct(\GDI\Entity\TJurisdictionProduct $jurisdictionProduct = null)
    {
        $this->jurisdictionProduct = $jurisdictionProduct;

        return $this;
    }

    /**
     * Get jurisdictionProduct
     *
     * @return \GDI\Entity\TJurisdictionProduct
     */
    public function getJurisdictionProduct()
    {
        return $this->jurisdictionProduct;
    }


}

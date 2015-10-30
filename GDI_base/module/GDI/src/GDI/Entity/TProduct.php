<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;
use Zend\XmlRpc\Value\DateTime;

/**
 * TProduct
 *
 * @ORM\Table(name="t_product", uniqueConstraints={@ORM\UniqueConstraint(name="control_id", columns={"control_id"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\TProductRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("TProduct")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ClassMethods")
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class TProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     */
    protected $productId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\TMarketProduct", mappedBy="product", cascade={"persist"})
     */
    protected $TMarketProduct_product;

    /**
     * @var string
     *
     * @ORM\Column(name="control_id", type="string", length=20, nullable=true, unique=true)
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(true)
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"1", "max":"20"}})
     * @Annotation\Options({"label":"Control No"})
     * @Annotation\Attributes({"id":"control-no", "class": "form-control"})
     */
    protected $controlId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_artwork_sp_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Artwork (SP) Upload"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"artwork-est", "class": "form-control"})
     */
    protected $eArtworkSpDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_artwork_sp_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Artwork (SP) Upload  (Result)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"artwork-rest", "class": "form-control"})
     *
     */
    protected $rArtworkSpDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_gslick_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"G-Slick Upload (Estimated)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"gslick-est", "class": "form-control"})
     */
    protected $eGslickDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_gslick_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"G-Slick Upload (Result)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"gslick-rest", "class": "form-control"})
     */
    protected $rGslickDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_demo_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Demo Software (Estimated)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"demo-software-release-est", "class": "form-control"})
     */
    protected $eDemoDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_demo_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Demo Software (Result)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"demo-software-release-rest", "class": "form-control"})
     */
    protected $rDemoDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_movie_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Movie (Estimated)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"movie-est", "class": "form-control"})
     */
    protected $eMovieDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_movie_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Movie (Result)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"movie-rest", "class": "form-control"})
     *
     */
    protected $rMovieDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_artwork_tr_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Artwork (TR) (Estimated)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"artwork-tr-est", "class": "form-control"})
     */
    protected $eArtworkTrDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_artwork_tr_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Artwork (TR) (Result)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"artwork-tr-rest", "class": "form-control"})
     */
    protected $rArtworkTrDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_website_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Website (Estimated)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"website-est", "class": "form-control"})
     */
    protected $eWebsiteDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_website_date", type="date", nullable=true)
     *
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Required(false)
     * @Annotation\Options({"label":"Website (Result)"})
     * @Annotation\Validator({"name":"Date"})
     * @Annotation\Attributes({"id":"website-rest", "class": "form-control"})
     */
    protected $rWebsiteDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_return_demo", columnDefinition="TINYINT DEFAULT 0 NULL",nullable=true)
     *
     * @Annotation\Options({
     *      "label":"Return Demo Software"
     * })
     *
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     */
    protected $isReturnDemo = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="game_image_pass", type="string", length=100, nullable=true)
     *
     * @Annotation\Input("Zend\InputFilter\FileInput")
     * @Annotation\Filter({"name":"File\RenameUpload", "options":{"target":"./public/img/uploads/","randomize":true, "use_upload_name":true, "use_upload_extension":true}})
     * @Annotation\Type("Zend\Form\Element\File")
     * @Annotation\Options({"label":"Game Image"})
     * @Annotation\Attributes({"accept":"image/*"})
     * @Annotation\Validator({"name": "File\UploadFile"})
     * @Annotation\Validator({"name": "File\IsImage"})
     * @Annotation\Attributes({"id":"game-img", "class": ""})
     */
    protected $gameImagePass;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", columnDefinition="TINYINT DEFAULT 0 NULL", nullable=true)
     *
     * @Annotation\Required(FALSE)
     * @Annotation\Attributes({"value": 0})
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
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }
    /**
     * Set controlId
     *
     * @param string $controlId
     *
     * @return TProduct
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
     * @return TProduct
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
    public function getEArtworkSpDate($format='Y-m-d')
    {
        if($this->eArtworkSpDate instanceof \DateTime){
            return  $this->eArtworkSpDate->format($format);
        }
        return $this->eArtworkSpDate;
    }

    /**
     * Set rArtworkSpDate
     *
     * @param \DateTime $rArtworkSpDate
     *
     * @return TProduct
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
    public function getRArtworkSpDate($format='Y-m-d')
    {
        if($this->rArtworkSpDate instanceof \DateTime){
            return  $this->rArtworkSpDate->format($format);
        }
        return $this->rArtworkSpDate;
    }

    /**
     * Set eGslickDate
     *
     * @param \DateTime $eGslickDate
     *
     * @return TProduct
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
    public function getEGslickDate($format='Y-m-d')
    {
        if($this->eGslickDate instanceof \DateTime){
            return  $this->eGslickDate->format($format);
        }
        return $this->eGslickDate;
    }

    /**
     * Set rGslickDate
     *
     * @param \DateTime $rGslickDate
     *
     * @return TProduct
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
    public function getRGslickDate($format='Y-m-d')
    {
        if($this->rGslickDate instanceof \DateTime){
            return  $this->rGslickDate->format($format);
        }
        return $this->rGslickDate;
    }

    /**
     * Set eDemoDate
     *
     * @param \DateTime $eDemoDate
     *
     * @return TProduct
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
    public function getEDemoDate($format='Y-m-d')
    {
        if($this->eDemoDate instanceof \DateTime){
            return  $this->eDemoDate->format($format);
        }
        return $this->eDemoDate;
    }

    /**
     * Set rDemoDate
     *
     * @param \DateTime $rDemoDate
     *
     * @return TProduct
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
    public function getRDemoDate($format='Y-m-d')
    {
        if($this->rDemoDate instanceof \DateTime){
            return  $this->rDemoDate->format($format);
        }
        return $this->rDemoDate;
    }

    /**
     * Set eMovieDate
     *
     * @param \DateTime $eMovieDate
     *
     * @return TProduct
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
    public function getEMovieDate($format='Y-m-d')
    {
        if($this->eMovieDate instanceof \DateTime){
            return  $this->eMovieDate->format($format);
        }
        return $this->eMovieDate;
    }

    /**
     * Set rMovieDate
     *
     * @param \DateTime $rMovieDate
     *
     * @return TProduct
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
    public function getRMovieDate($format='Y-m-d')
    {
        if($this->rMovieDate instanceof \DateTime){
            return  $this->rMovieDate->format($format);
        }
        return $this->rMovieDate;
    }

    /**
     * Set eArtworkTrDate
     *
     * @param \DateTime $eArtworkTrDate
     *
     * @return TProduct
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
    public function getEArtworkTrDate($format='Y-m-d')
    {
        if($this->eArtworkTrDate instanceof \DateTime){
            return  $this->eArtworkTrDate->format($format);
        }
        return $this->eArtworkTrDate;
    }

    /**
     * Set rArtworkTrDate
     *
     * @param \DateTime $rArtworkTrDate
     *
     * @return TProduct
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
    public function getRArtworkTrDate($format='Y-m-d')
    {
        if($this->rArtworkTrDate instanceof \DateTime){
            return  $this->rArtworkTrDate->format($format);
        }
        return $this->rArtworkTrDate;
    }

    /**
     * Set eWebsiteDate
     *
     * @param \DateTime $eWebsiteDate
     *
     * @return TProduct
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
    public function getEWebsiteDate($format='Y-m-d')
    {
        if($this->eWebsiteDate instanceof \DateTime){
            return  $this->eWebsiteDate->format($format);
        }
        return $this->eWebsiteDate;
    }

    /**
     * Set rWebsiteDate
     *
     * @param \DateTime $rWebsiteDate
     *
     * @return TProduct
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
    public function getRWebsiteDate($format='Y-m-d')
    {
        if($this->rWebsiteDate instanceof \DateTime){
            return  $this->rWebsiteDate->format($format);
        }
        return $this->rWebsiteDate;
    }

    /**
     * Set isReturnDemo
     *
     * @param boolean $isReturnDemo
     *
     * @return TProduct
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
     * @return TProduct
     */
    public function setGameImagePass($gameImagePass)
    {
        if (is_array($gameImagePass) && isset($gameImagePass['tmp_name'])) {
            $gameImagePass = end(explode('/',$gameImagePass['tmp_name']));
        }
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
     * @return TProduct
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
     * @return TProduct
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
     * @ORM\PrePersist()
     *
     * @return TProduct
     */
    public function setCreateTime()
    {
        $this->createTime = new \DateTime();

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
     * @return TProduct
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
     * @return TProduct
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
        //$this->TMarketProduct_product = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tMarketProductProduct
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductProduct
     *
     * @return TProduct
     */
    public function addTMarketProductProduct(\GDI\Entity\TMarketProduct $tMarketProductProduct)
    {
        $this->TMarketProduct_product[] = $tMarketProductProduct;

        return $this;
    }

    /**
     * Remove tMarketProductProduct
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductProduct
     */
    public function removeTMarketProductProduct(\GDI\Entity\TMarketProduct $tMarketProductProduct)
    {
        $this->TMarketProduct_product->removeElement($tMarketProductProduct);
    }

    /**
     * Get tMarketProductProduct
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTMarketProductProduct()
    {
        return $this->TMarketProduct_product;
    }

    /**
     * [getArtworkSpStatus status of artworksp estimated, result]
     *
     * @return [date] [date of development]
     *         [stats] [estimated / done]
     */
    public function getArtworkSpStatus()
    {
        if ($this->getRArtworkSpDate()) {
            return array( 'date' => $this->getRArtworkSpDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getEArtworkSpDate()) {
            return array('date' => $this->getEArtworkSpDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getGslickStatus status of gslick estimated, result]
     *
     * @return [date] [date of gslick]
     *         [stats] [estimated / done]
     */
    public function getGslickStatus()
    {
        if ($this->getRGslickDate()) {
            return array( 'date' => $this->getRGslickDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getEGslickDate()) {
            return array('date' => $this->getEGslickDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getDemoeStatus status of demosoftware estimated, result]
     *
     * @return [date] [date of demosoftware]
     *         [stats] [estimated / done]
     */
    public function getDemoeStatus()
    {
        if ($this->getRDemoDate()) {
            return array( 'date' => $this->getRDemoDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getEDemoDate()) {
            return array('date' => $this->getEDemoDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    
    /**
     * [getMovieStatus status of Movie estimated, result]
     *
     * @return [date] [date of movie]
     *         [stats] [estimated / done]
     */
    public function getMovieStatus()
    {
        if ($this->getRMovieDate()) {
            return array( 'date' => $this->getRMovieDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getEMovieDate()) {
            return array('date' => $this->getEMovieDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getArtworkTrStatus status of artwork training estimated, result]
     *
     * @return [date] [date of artwork training]
     *         [stats] [estimated / done]
     */
    public function getArtworkTrStatus()
    {
        if ($this->getRArtworkTrDate()) {
            return array( 'date' => $this->getRArtworkTrDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getEArtworkTrDate()) {
            return array('date' => $this->getEArtworkTrDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getWebsiteStatus status of website estimated, result]
     *
     * @return [date] [date of website]
     *         [stats] [estimated / done]
     */
    public function getWebsiteStatus()
    {
        if ($this->getRWebsiteDate()) {
            return array( 'date' => $this->getRWebsiteDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getEWebsiteDate()) {
            return array('date' => $this->getEWebsiteDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }
}

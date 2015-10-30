<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TJurisdictionProduct
 *
 * @ORM\Table(name="t_jurisdiction_product", indexes={@ORM\Index(name="t_jurisdiction_product_fi1", columns={"market_product_id"}), @ORM\Index(name="t_jurisdiction_product_fi2", columns={"jurisdiction_id"}), @ORM\Index(name="t_jurisdiction_product_fi3", columns={"status_id"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\TJurisdictionProductRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class TJurisdictionProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="jurisdiction_product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $jurisdictionProductId;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\TMarketProduct", inversedBy="TJurisdictionProduct_marketProduct", cascade={"persist"})
     * @ORM\JoinColumn(name="market_product_id", referencedColumnName="market_product_id", unique=false, nullable=false)
     */
    protected $marketProduct;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MJurisdiction", inversedBy="TJurisdictionProduct_jurisdiction", cascade={"persist"})
     * @ORM\JoinColumn(name="jurisdiction_id", referencedColumnName="jurisdiction_id", unique=false, nullable=false)
     */
    protected $jurisdiction;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MStatus", inversedBy="TJurisdictionProduct_status", cascade={"persist"})
     * @ORM\JoinColumn(name="status_id", referencedColumnName="status_id", unique=false, nullable=false)
     */
    protected $status;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\TMarketProduct", mappedBy="jurisdictionProduct", cascade={"persist"})
     */
    protected $TJurisdictionProduct_jurisdictionProduct;

    /**
     * @var integer
     *
     * @ORM\Column(name="market_product_id", type="integer", nullable=false)
     */
    protected $marketProductId;

    /**
     * @var integer
     *
     * @ORM\Column(name="jurisdiction_id", type="integer", nullable=false)
     */
    protected $jurisdictionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="status_id", type="integer", nullable=false)
     */
    protected $statusId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_submission_date", type="date", nullable=true)
     */
    protected $eSubmissionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_submission_date", type="date", nullable=true)
     */
    protected $rSubmissionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_regulator_date", type="date", nullable=true)
     */
    protected $eRegulatorDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_regulator_date", type="date", nullable=true)
     */
    protected $rRegulatorDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_approval_date", type="date", nullable=true)
     */
    protected $eApprovalDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_approval_date", type="date", nullable=true)
     */
    protected $rApprovalDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_release_date", type="date", nullable=true)
     */
    protected $eReleaseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_release_date", type="date", nullable=true)
     */
    protected $rReleaseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="e_launch_date", type="date", nullable=true)
     */
    protected $eLaunchDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="r_launch_date", type="date", nullable=true)
     */
    protected $rLaunchDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", columnDefinition="TINYINT DEFAULT 0 NULL", nullable=true)
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
     * Get jurisdictionProductId
     *
     * @return integer
     */
    public function getJurisdictionProductId()
    {
        return $this->jurisdictionProductId;
    }

    /**
     * Set marketProductId
     *
     * @param integer $marketProductId
     *
     * @return TJurisdictionProduct
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
     * Set jurisdictionId
     *
     * @param integer $jurisdictionId
     *
     * @return TJurisdictionProduct
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
     * Set statusId
     *
     * @param integer $statusId
     *
     * @return TJurisdictionProduct
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * Get statusId
     *
     * @return integer
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * Set eSubmissionDate
     *
     * @param \DateTime $eSubmissionDate
     *
     * @return TJurisdictionProduct
     */
    public function setESubmissionDate($eSubmissionDate)
    {
        $this->eSubmissionDate = $eSubmissionDate;

        return $this;
    }

    /**
     * Get eSubmissionDate
     *
     * @return \DateTime
     */
    public function getESubmissionDate($format='Y-m-d')
    {
        if($this->eSubmissionDate instanceof \DateTime){
            return  $this->eSubmissionDate->format($format);
        }
        return $this->eSubmissionDate;
    }

    /**
     * Set rSubmissionDate
     *
     * @param \DateTime $rSubmissionDate
     *
     * @return TJurisdictionProduct
     */
    public function setRSubmissionDate($rSubmissionDate)
    {
        $this->rSubmissionDate = $rSubmissionDate;

        return $this;
    }

    /**
     * Get rSubmissionDate
     *
     * @return \DateTime
     */
    public function getRSubmissionDate($format='Y-m-d')
    {
        if($this->rSubmissionDate instanceof \DateTime){
            return  $this->rSubmissionDate->format($format);
        }
        return $this->rSubmissionDate;
    }

    /**
     * Set eRegulatorDate
     *
     * @param \DateTime $eRegulatorDate
     *
     * @return TJurisdictionProduct
     */
    public function setERegulatorDate($eRegulatorDate)
    {
        $this->eRegulatorDate = $eRegulatorDate;

        return $this;
    }

    /**
     * Get eRegulatorDate
     *
     * @return \DateTime
     */
    public function getERegulatorDate($format='Y-m-d')
    {
        if($this->eRegulatorDate instanceof \DateTime){
            return  $this->eRegulatorDate->format($format);
        }
        return $this->eRegulatorDate;
    }

    /**
     * Set rRegulatorDate
     *
     * @param \DateTime $rRegulatorDate
     *
     * @return TJurisdictionProduct
     */
    public function setRRegulatorDate($rRegulatorDate)
    {
        $this->rRegulatorDate = $rRegulatorDate;

        return $this;
    }

    /**
     * Get rRegulatorDate
     *
     * @return \DateTime
     */
    public function getRRegulatorDate($format='Y-m-d')
    {
        if($this->rRegulatorDate instanceof \DateTime){
            return  $this->rRegulatorDate->format($format);
        }
        return $this->rRegulatorDate;
    }

    /**
     * Set eApprovalDate
     *
     * @param \DateTime $eApprovalDate
     *
     * @return TJurisdictionProduct
     */
    public function setEApprovalDate($eApprovalDate)
    {
        $this->eApprovalDate = $eApprovalDate;

        return $this;
    }

    /**
     * Get eApprovalDate
     *
     * @return \DateTime
     */
    public function getEApprovalDate($format='Y-m-d')
    {
        if($this->eApprovalDate instanceof \DateTime){
            return  $this->eApprovalDate->format($format);
        }
        return $this->eApprovalDate;
    }

    /**
     * Set rApprovalDate
     *
     * @param \DateTime $rApprovalDate
     *
     * @return TJurisdictionProduct
     */
    public function setRApprovalDate($rApprovalDate)
    {
        $this->rApprovalDate = $rApprovalDate;

        return $this;
    }

    /**
     * Get rApprovalDate
     *
     * @return \DateTime
     */
    public function getRApprovalDate($format='Y-m-d')
    {
        if($this->rApprovalDate instanceof \DateTime){
            return  $this->rApprovalDate->format($format);
        }
        return $this->rApprovalDate;
    }

    /**
     * Set eReleaseDate
     *
     * @param \DateTime $eReleaseDate
     *
     * @return TJurisdictionProduct
     */
    public function setEReleaseDate($eReleaseDate)
    {
        $this->eReleaseDate = $eReleaseDate;

        return $this;
    }

    /**
     * Get eReleaseDate
     *
     * @return \DateTime
     */
    public function getEReleaseDate($format='Y-m-d')
    {
        if($this->eReleaseDate instanceof \DateTime){
            return  $this->eReleaseDate->format($format);
        }
        return $this->eReleaseDate;
    }

    /**
     * Set rReleaseDate
     *
     * @param \DateTime $rReleaseDate
     *
     * @return TJurisdictionProduct
     */
    public function setRReleaseDate($rReleaseDate)
    {
        $this->rReleaseDate = $rReleaseDate;

        return $this;
    }

    /**
     * Get rReleaseDate
     *
     * @return \DateTime
     */
    public function getRReleaseDate($format='Y-m-d')
    {
        if($this->rReleaseDate instanceof \DateTime){
            return  $this->rReleaseDate->format($format);
        }
        return $this->rReleaseDate;
    }

    /**
     * Set eLaunchDate
     *
     * @param \DateTime $eLaunchDate
     *
     * @return TJurisdictionProduct
     */
    public function setELaunchDate($eLaunchDate)
    {
        $this->eLaunchDate = $eLaunchDate;

        return $this;
    }

    /**
     * Get eLaunchDate
     *
     * @return \DateTime
     */
    public function getELaunchDate($format='Y-m-d')
    {
        if($this->eLaunchDate instanceof \DateTime){
            return  $this->eLaunchDate->format($format);
        }
        return $this->eLaunchDate;
    }

    /**
     * Set rLaunchDate
     *
     * @param \DateTime $rLaunchDate
     *
     * @return TJurisdictionProduct
     */
    public function setRLaunchDate($rLaunchDate)
    {
        $this->rLaunchDate = $rLaunchDate;

        return $this;
    }

    /**
     * Get rLaunchDate
     *
     * @return \DateTime
     */
    public function getRLaunchDate($format='Y-m-d')
    {
        if($this->rLaunchDate instanceof \DateTime){
            return  $this->rLaunchDate->format($format);
        }
        return $this->rLaunchDate;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return TJurisdictionProduct
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
     * @return TJurisdictionProduct
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
     * @return TJurisdictionProduct
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
     * @return TJurisdictionProduct
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
     * @return TJurisdictionProduct
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
     * Set marketProduct
     *
     * @param \GDI\Entity\TMarketProduct $marketProduct
     *
     * @return TJurisdictionProduct
     */
    public function setMarketProduct(\GDI\Entity\TMarketProduct $marketProduct)
    {
        $this->marketProduct = $marketProduct;

        return $this;
    }

    /**
     * Get marketProduct
     *
     * @return \GDI\Entity\TMarketProduct
     */
    public function getMarketProduct()
    {
        return $this->marketProduct;
    }

    /**
     * Set jurisdiction
     *
     * @param \GDI\Entity\MJurisdiction $jurisdiction
     *
     * @return TJurisdictionProduct
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

    /**
     * Set status
     *
     * @param \GDI\Entity\MStatus $status
     *
     * @return TJurisdictionProduct
     */
    public function setStatus(\GDI\Entity\MStatus $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \GDI\Entity\MStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * [getJurisProductStatus status of jurisdiction product]
     * @return [status_id] [id of status]
     */
    public function getJurisProductStatus()
    {
        $status_id = 1;
        // hardcoded 
        if ($this->getRLaunchDate()) {
            $status_id = 8;
        } else if ($this->getRReleaseDate()) {
            $status_id = 7;
        } else if ($this->getRApprovalDate()) {
            $status_id = 6;
        } else if ($this->getRRegulatorDate()) {
            $status_id = 5;
        } else if ($this->getRSubmissionDate()) {
            $status_id = 4;
        } else if ($this->getMarketProduct()->getRDevFinishDate()) {
            $status_id = 3;
        } else if ($this->getMarketProduct()->getRDevStartDate()) {
            $status_id = 2;
        } else {
            $status_id = 1;
        }


        return $status_id;
    }

    /**
     * [getSubmission status of submission estimated, result]
     *
     * @return [date] [date of submmission]
     *         [stats] [estimated / done]
     */
    public function getSubmissionStatus()
    {
        if ($this->getRSubmissionDate()) {
            return array( 'date' => $this->getRSubmissionDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getESubmissionDate()) {
            return array('date' => $this->getESubmissionDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getApproval status of approval estimated, result]
     *
     * @return [date] [date of approval]
     *         [stats] [estimated / done]
     */
    public function getApprovalStatus()
    {
        if ($this->getRApprovalDate()) {
            return array( 'date' => $this->getRApprovalDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getEApprovalDate()) {
            return array('date' => $this->getEApprovalDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getRegulatorStatus status of regulator estimated, result]
     *
     * @return [date] [date of approval]
     *         [stats] [estimated / done]
     */
    public function getRegulatorStatus()
    {
        if ($this->getRRegulatorDate()) {
            return array( 'date' => $this->getRRegulatorDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getERegulatorDate()) {
            return array('date' => $this->getERegulatorDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }
    
    /**
     * [getRelease status of master release estimated, result]
     *
     * @return [date] [date of approval]
     *         [stats] [estimated / done]
     */
    public function getReleaseStatus()
    {
        if ($this->getRReleaseDate()) {
            return array( 'date' => $this->getRReleaseDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getEReleaseDate()) {
            return array('date' => $this->getEReleaseDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * [getLaunch status of launch estimated, result]
     *
     * @return [date] [date of approval]
     *         [stats] [estimated / done]
     */
    public function getLaunchStatus()
    {
        if ($this->getRLaunchDate()) {
            return array( 'date' => $this->getRLaunchDate('m/d/Y') , 'stats' => 'est', 'class' => 'bg-orange' );
        } else if ($this->getELaunchDate()) {
            return array('date' => $this->getELaunchDate('m/d/Y'), 'stats' => 'rest', 'class' => 'bg-yellow' );
        }
        return array('date'=>'', 'stats' => '','class'=> '');
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->TJurisdictionProduct_jurisdictionProduct = new \Doctrine\Common\Collections\ArrayCollection();
    }

   /* public function __toString()
    {
        //var_dump($this->jurisdictionProductId);
        return (string)$this->jurisdictionProductId;
    }*/
    /**
     * Add tJurisdictionProductJurisdictionProduct
     *
     * @param \GDI\Entity\TMarketProduct $tJurisdictionProductJurisdictionProduct
     *
     * @return TJurisdictionProduct
     */
    public function addTJurisdictionProductJurisdictionProduct(\GDI\Entity\TMarketProduct $tJurisdictionProductJurisdictionProduct)
    {
        $this->TJurisdictionProduct_jurisdictionProduct[] = $tJurisdictionProductJurisdictionProduct;

        return $this;
    }

    /**
     * Remove tJurisdictionProductJurisdictionProduct
     *
     * @param \GDI\Entity\TMarketProduct $tJurisdictionProductJurisdictionProduct
     */
    public function removeTJurisdictionProductJurisdictionProduct(\GDI\Entity\TMarketProduct $tJurisdictionProductJurisdictionProduct)
    {
        $this->TJurisdictionProduct_jurisdictionProduct->removeElement($tJurisdictionProductJurisdictionProduct);
    }

    /**
     * Get tJurisdictionProductJurisdictionProduct
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTJurisdictionProductJurisdictionProduct()
    {
        return $this->TJurisdictionProduct_jurisdictionProduct;
    }
}

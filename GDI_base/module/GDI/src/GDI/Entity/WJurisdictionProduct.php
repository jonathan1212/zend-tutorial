<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WJurisdictionProduct
 *
 * @ORM\Table(name="w_jurisdiction_product")
 * @ORM\Entity(repositoryClass="GDI\Repository\WJurisdictionProductRepository")
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class WJurisdictionProduct
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
     * @return WJurisdictionProduct
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
     * @return WJurisdictionProduct
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
     * @return WJurisdictionProduct
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
     * @return WJurisdictionProduct
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
    public function getESubmissionDate()
    {
        return $this->eSubmissionDate;
    }

    /**
     * Set rSubmissionDate
     *
     * @param \DateTime $rSubmissionDate
     *
     * @return WJurisdictionProduct
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
    public function getRSubmissionDate()
    {
        return $this->rSubmissionDate;
    }

    /**
     * Set eRegulatorDate
     *
     * @param \DateTime $eRegulatorDate
     *
     * @return WJurisdictionProduct
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
    public function getERegulatorDate()
    {
        return $this->eRegulatorDate;
    }

    /**
     * Set rRegulatorDate
     *
     * @param \DateTime $rRegulatorDate
     *
     * @return WJurisdictionProduct
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
    public function getRRegulatorDate()
    {
        return $this->rRegulatorDate;
    }

    /**
     * Set eApprovalDate
     *
     * @param \DateTime $eApprovalDate
     *
     * @return WJurisdictionProduct
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
    public function getEApprovalDate()
    {
        return $this->eApprovalDate;
    }

    /**
     * Set rApprovalDate
     *
     * @param \DateTime $rApprovalDate
     *
     * @return WJurisdictionProduct
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
    public function getRApprovalDate()
    {
        return $this->rApprovalDate;
    }

    /**
     * Set eReleaseDate
     *
     * @param \DateTime $eReleaseDate
     *
     * @return WJurisdictionProduct
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
    public function getEReleaseDate()
    {
        return $this->eReleaseDate;
    }

    /**
     * Set rReleaseDate
     *
     * @param \DateTime $rReleaseDate
     *
     * @return WJurisdictionProduct
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
    public function getRReleaseDate()
    {
        return $this->rReleaseDate;
    }

    /**
     * Set eLaunchDate
     *
     * @param \DateTime $eLaunchDate
     *
     * @return WJurisdictionProduct
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
    public function getELaunchDate()
    {
        return $this->eLaunchDate;
    }

    /**
     * Set rLaunchDate
     *
     * @param \DateTime $rLaunchDate
     *
     * @return WJurisdictionProduct
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
    public function getRLaunchDate()
    {
        return $this->rLaunchDate;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return WJurisdictionProduct
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
     * @return WJurisdictionProduct
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
     * @return WJurisdictionProduct
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
     * @return WJurisdictionProduct
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
     * @return WJurisdictionProduct
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

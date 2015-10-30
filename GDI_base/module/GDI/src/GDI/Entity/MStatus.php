<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MStatus
 *
 * @ORM\Table(name="m_status", uniqueConstraints={@ORM\UniqueConstraint(name="status_name", columns={"status_name"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MStatusRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class MStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="status_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $statusId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\TJurisdictionProduct", mappedBy="status", cascade={"persist"})
     */
    protected  $TJurisdictionProduct_status;
    /**
     * @var string
     *
     * @ORM\Column(name="status_name", type="string", length=30, nullable=false)
     */
    protected $statusName;

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
     * Get statusId
     *
     * @return integer
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * Set statusName
     *
     * @param string $statusName
     *
     * @return MStatus
     */
    public function setStatusName($statusName)
    {
        $this->statusName = $statusName;

        return $this;
    }

    /**
     * Get statusName
     *
     * @return string
     */
    public function getStatusName()
    {
        return $this->statusName;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MStatus
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
     * @return MStatus
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
     * @return MStatus
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
     * @return MStatus
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
     * @return MStatus
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
        $this->TJurisdictionProduct_status = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tJurisdictionProductStatus
     *
     * @param \GDI\Entity\TJurisdictionProduct $tJurisdictionProductStatus
     *
     * @return MStatus
     */
    public function addTJurisdictionProductStatus(\GDI\Entity\TJurisdictionProduct $tJurisdictionProductStatus)
    {
        $this->TJurisdictionProduct_status[] = $tJurisdictionProductStatus;

        return $this;
    }

    /**
     * Remove tJurisdictionProductStatus
     *
     * @param \GDI\Entity\TJurisdictionProduct $tJurisdictionProductStatus
     */
    public function removeTJurisdictionProductStatus(\GDI\Entity\TJurisdictionProduct $tJurisdictionProductStatus)
    {
        $this->TJurisdictionProduct_status->removeElement($tJurisdictionProductStatus);
    }

    /**
     * Get tJurisdictionProductStatus
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTJurisdictionProductStatus()
    {
        return $this->TJurisdictionProduct_status;
    }
}

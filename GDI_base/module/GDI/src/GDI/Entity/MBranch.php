<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MBranch
 *
 * @ORM\Table(name="m_branch", uniqueConstraints={@ORM\UniqueConstraint(name="branch_name", columns={"branch_name"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MBranchRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015

 */
class MBranch
{
    /**
     * @var integer
     *
     * @ORM\Column(name="branch_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $branchId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\TMarketProduct", mappedBy="branch", cascade={"persist"})
     */
    protected $TMarketProduct_branch;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\MUser", mappedBy="branch", cascade={"persist"})
     */
    protected $MUser_branch;

    /**
     * @var string
     *
     * @ORM\Column(name="branch_name", type="string", length=30, nullable=false)
     */
    protected $branchName;

    /**
     * @var string
     *
     * @ORM\Column(name="branch_abbr", type="string", length=30, nullable=false)
     */
    protected $branchAbbr;

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
     * Get branchId
     *
     * @return integer
     */
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * Set branchName
     *
     * @param string $branchName
     *
     * @return MBranch
     */
    public function setBranchName($branchName)
    {
        $this->branchName = $branchName;

        return $this;
    }

    /**
     * Get branchName
     *
     * @return string
     */
    public function getBranchName()
    {
        return $this->branchName;
    }

    /**
     * Set branchAbbr
     *
     * @param string $branchAbbr
     *
     * @return MBranch
     */
    public function setBranchAbbr($branchAbbr)
    {
        $this->branchAbbr = $branchAbbr;

        return $this;
    }

    /**
     * Get branchAbbr
     *
     * @return string
     */
    public function getBranchAbbr()
    {
        return $this->branchAbbr;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MBranch
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
     * @return MBranch
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
     * @return MBranch
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
     * @return MBranch
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
     * @return MBranch
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
        $this->TMarketProduct_branch = new \Doctrine\Common\Collections\ArrayCollection();
        $this->MUser_branch = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tMarketProductBranch
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductBranch
     *
     * @return MBranch
     */
    public function addTMarketProductBranch(\GDI\Entity\TMarketProduct $tMarketProductBranch)
    {
        $this->TMarketProduct_branch[] = $tMarketProductBranch;

        return $this;
    }

    /**
     * Remove tMarketProductBranch
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductBranch
     */
    public function removeTMarketProductBranch(\GDI\Entity\TMarketProduct $tMarketProductBranch)
    {
        $this->TMarketProduct_branch->removeElement($tMarketProductBranch);
    }

    /**
     * Get tMarketProductBranch
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTMarketProductBranch()
    {
        return $this->TMarketProduct_branch;
    }

    /**
     * Add mUserBranch
     *
     * @param \GDI\Entity\MUser $mUserBranch
     *
     * @return MBranch
     */
    public function addMUserBranch(\GDI\Entity\MUser $mUserBranch)
    {
        $this->MUser_branch[] = $mUserBranch;

        return $this;
    }

    /**
     * Remove mUserBranch
     *
     * @param \GDI\Entity\MUser $mUserBranch
     */
    public function removeMUserBranch(\GDI\Entity\MUser $mUserBranch)
    {
        $this->MUser_branch->removeElement($mUserBranch);
    }

    /**
     * Get mUserBranch
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMUserBranch()
    {
        return $this->MUser_branch;
    }
}

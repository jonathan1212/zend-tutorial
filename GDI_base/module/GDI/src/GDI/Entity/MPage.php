<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MPage
 *
 * @ORM\Table(name="m_page", uniqueConstraints={@ORM\UniqueConstraint(name="page_name", columns={"page_name"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MPageRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class MPage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="page_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $pageId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\RRolePage", mappedBy="page", cascade={"persist"})
     */
    protected $RRolePage_page;

    /**
     * @var string
     *
     * @ORM\Column(name="page_name", type="string", length=100, nullable=false)
     */
    protected $pageName;

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
     * Get pageId
     *
     * @return integer
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Set pageName
     *
     * @param string $pageName
     *
     * @return MPage
     */
    public function setPageName($pageName)
    {
        $this->pageName = $pageName;

        return $this;
    }

    /**
     * Get pageName
     *
     * @return string
     */
    public function getPageName()
    {
        return $this->pageName;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MPage
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
     * @return MPage
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
     * @return MPage
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
     * @return MPage
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
     * @return MPage
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
        $this->RRolePage_page = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rRolePagePage
     *
     * @param \GDI\Entity\RRolePage $rRolePagePage
     *
     * @return MPage
     */
    public function addRRolePagePage(\GDI\Entity\RRolePage $rRolePagePage)
    {
        $this->RRolePage_page[] = $rRolePagePage;

        return $this;
    }

    /**
     * Remove rRolePagePage
     *
     * @param \GDI\Entity\RRolePage $rRolePagePage
     */
    public function removeRRolePagePage(\GDI\Entity\RRolePage $rRolePagePage)
    {
        $this->RRolePage_page->removeElement($rRolePagePage);
    }

    /**
     * Get rRolePagePage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRRolePagePage()
    {
        return $this->RRolePage_page;
    }
}

<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MRole
 *
 * @ORM\Table(name="m_role", uniqueConstraints={@ORM\UniqueConstraint(name="role_name", columns={"role_name"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MRoleRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class MRole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $roleId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\RUserRole", mappedBy="role", cascade={"persist"})
     */
    protected $mRoleRoleId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\RRolePage", mappedBy="role", cascade={"persist"})
     */
    protected $RRolePage_role;
    /**
     * @var string
     *
     * @ORM\Column(name="role_name", type="string", length=100, nullable=false)
     */
    protected $roleName;

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
     * Get roleId
     *
     * @return integer
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set roleName
     *
     * @param string $roleName
     *
     * @return MRole
     */
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;

        return $this;
    }

    /**
     * Get roleName
     *
     * @return string
     */
    public function getRoleName()
    {
        return $this->roleName;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MRole
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
     * @return MRole
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
     * @return MRole
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
     * @return MRole
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
     * @return MRole
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
        $this->mRoleRoleId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mRoleRoleId
     *
     * @param \GDI\Entity\RUserRole $mRoleRoleId
     *
     * @return MRole
     */
    public function addMRoleRoleId(\GDI\Entity\RUserRole $mRoleRoleId)
    {
        $this->mRoleRoleId[] = $mRoleRoleId;

        return $this;
    }

    /**
     * Remove mRoleRoleId
     *
     * @param \GDI\Entity\RUserRole $mRoleRoleId
     */
    public function removeMRoleRoleId(\GDI\Entity\RUserRole $mRoleRoleId)
    {
        $this->mRoleRoleId->removeElement($mRoleRoleId);
    }

    /**
     * Get mRoleRoleId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMRoleRoleId()
    {
        return $this->mRoleRoleId;
    }

    /**
     * Add rRolePageRole
     *
     * @param \GDI\Entity\RRolePage $rRolePageRole
     *
     * @return MRole
     */
    public function addRRolePageRole(\GDI\Entity\RRolePage $rRolePageRole)
    {
        $this->RRolePage_role[] = $rRolePageRole;

        return $this;
    }

    /**
     * Remove rRolePageRole
     *
     * @param \GDI\Entity\RRolePage $rRolePageRole
     */
    public function removeRRolePageRole(\GDI\Entity\RRolePage $rRolePageRole)
    {
        $this->RRolePage_role->removeElement($rRolePageRole);
    }

    /**
     * Get rRolePageRole
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRRolePageRole()
    {
        return $this->RRolePage_role;
    }
}

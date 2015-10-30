<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RUserRole
 *
 * @ORM\Table(name="r_user_role", indexes={@ORM\Index(name="r_user_role_fi1", columns={"user_id"}), @ORM\Index(name="r_user_role_fi2", columns={"role_id"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\RUserRoleRepository")
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class RUserRole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MUser", inversedBy="rUserRoleUserId", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id", unique=false, nullable=false)
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MRole", inversedBy="mRoleRoleId", cascade={"persist"})
     * @ORM\JoinColumn(name="role_id", referencedColumnName="role_id", unique=false, nullable=false)
     */
    protected $role;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    protected $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     */
    protected $roleId;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set roleId
     *
     * @param integer $roleId
     *
     * @return RUserRole
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;

        return $this;
    }

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
     * Set user
     *
     * @param \GDI\Entity\MUser $user
     *
     * @return RUserRole
     */
    public function setUser(\GDI\Entity\MUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \GDI\Entity\MUser
     */
    public function getUser()
    {
        return $this->user;
    }



    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return RUserRole
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set role
     *
     * @param \GDI\Entity\MRole $role
     *
     * @return RUserRole
     */
    public function setRole(\GDI\Entity\MRole $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \GDI\Entity\MRole
     */
    public function getRole()
    {
        return $this->role;
    }
}

<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RRolePage
 *
 * @ORM\Table(name="r_role_page", indexes={@ORM\Index(name="r_role_pagefi1", columns={"role_id"}), @ORM\Index(name="r_role_pagefi2", columns={"page_id"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\RRolePageRepository")
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class RRolePage
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
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MRole", inversedBy="RRolePage_role", cascade={"persist"})
     * @ORM\JoinColumn(name="role_id", referencedColumnName="role_id", unique=false, nullable=false)
     */
    protected $role;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MPage", inversedBy="RRolePage_page", cascade={"persist"})
     * @ORM\JoinColumn(name="page_id", referencedColumnName="page_id", unique=false, nullable=false)
     */
    protected $page;

    /**
     * @var integer
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     */
    protected $roleId;

    /**
     * @var integer
     *
     * @ORM\Column(name="page_id", type="integer", nullable=false)
     */
    protected $pageId;



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
     * @return RRolePage
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
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return RRolePage
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;

        return $this;
    }

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
     * Set role
     *
     * @param \GDI\Entity\MRole $role
     *
     * @return RRolePage
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

    /**
     * Set page
     *
     * @param \GDI\Entity\MPage $page
     *
     * @return RRolePage
     */
    public function setPage(\GDI\Entity\MPage $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \GDI\Entity\MPage
     */
    public function getPage()
    {
        return $this->page;
    }
}

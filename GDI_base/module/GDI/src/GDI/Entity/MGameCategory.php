<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 * MGameCategory
 *
 * @ORM\Table(name="m_game_category", uniqueConstraints={@ORM\UniqueConstraint(name="game_category_name", columns={"game_category_name"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MGameCategoryRepository")
 * ORM\HasLifecycleCallbacks()
 *
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("MGameCategory")
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class MGameCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="game_category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $gameCategoryId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\TMarketProduct", mappedBy="gameCategory", cascade={"persist"})
     */
    protected $TMarketProduct_gameCategory;

    /**
     * @var string
     *
     * @ORM\Column(name="game_category_name", type="string", length=30, nullable=false)
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     */
    protected $gameCategoryName;

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
     * Get gameCategoryId
     *
     * @return integer
     */
    public function getGameCategoryId()
    {
        return $this->gameCategoryId;
    }

    /**
     * Set gameCategoryName
     *
     * @param string $gameCategoryName
     *
     * @return MGameCategory
     */
    public function setGameCategoryName($gameCategoryName)
    {
        $this->gameCategoryName = $gameCategoryName;

        return $this;
    }

    /**
     * Get gameCategoryName
     *
     * @return string
     */
    public function getGameCategoryName()
    {
        return $this->gameCategoryName;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MGameCategory
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
     * @return MGameCategory
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
     * @return MGameCategory
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
     * @return MGameCategory
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
     * @return MGameCategory
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
        $this->TMarketProduct_gameCategory = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tMarketProductGameCategory
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductGameCategory
     *
     * @return MGameCategory
     */
    public function addTMarketProductGameCategory(\GDI\Entity\TMarketProduct $tMarketProductGameCategory)
    {
        $this->TMarketProduct_gameCategory[] = $tMarketProductGameCategory;

        return $this;
    }

    /**
     * Remove tMarketProductGameCategory
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductGameCategory
     */
    public function removeTMarketProductGameCategory(\GDI\Entity\TMarketProduct $tMarketProductGameCategory)
    {
        $this->TMarketProduct_gameCategory->removeElement($tMarketProductGameCategory);
    }

    /**
     * Get tMarketProductGameCategory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTMarketProductGameCategory()
    {
        return $this->TMarketProduct_gameCategory;
    }
}

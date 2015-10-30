<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MGameGroup
 *
 * @ORM\Table(name="m_game_group", uniqueConstraints={@ORM\UniqueConstraint(name="game_group_name", columns={"game_group_name"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MGameGroupRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 *
 */
class MGameGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="game_group_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $gameGroupId;

    /**
 * @ORM\OneToMany(targetEntity="GDI\Entity\TMarketProduct", mappedBy="gameGroup", cascade={"persist"})
 */
    protected $TMarketProduct_gameGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="game_group_name", type="string", length=50, nullable=false)
     */
    protected $gameGroupName;

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
     * Get gameGroupId
     *
     * @return integer
     */
    public function getGameGroupId()
    {
        return $this->gameGroupId;
    }

    /**
     * Set gameGroupName
     *
     * @param string $gameGroupName
     *
     * @return MGameGroup
     */
    public function setGameGroupName($gameGroupName)
    {
        $this->gameGroupName = $gameGroupName;

        return $this;
    }

    /**
     * Get gameGroupName
     *
     * @return string
     */
    public function getGameGroupName()
    {
        return $this->gameGroupName;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MGameGroup
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
     * @return MGameGroup
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
     * @return MGameGroup
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
     * @return MGameGroup
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
     * @return MGameGroup
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
        $this->TMarketProduct_gameGroup = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tMarketProductGameGroup
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductGameGroup
     *
     * @return MGameGroup
     */
    public function addTMarketProductGameGroup(\GDI\Entity\TMarketProduct $tMarketProductGameGroup)
    {
        $this->TMarketProduct_gameGroup[] = $tMarketProductGameGroup;

        return $this;
    }

    /**
     * Remove tMarketProductGameGroup
     *
     * @param \GDI\Entity\TMarketProduct $tMarketProductGameGroup
     */
    public function removeTMarketProductGameGroup(\GDI\Entity\TMarketProduct $tMarketProductGameGroup)
    {
        $this->TMarketProduct_gameGroup->removeElement($tMarketProductGameGroup);
    }

    /**
     * Get tMarketProductGameGroup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTMarketProductGameGroup()
    {
        return $this->TMarketProduct_gameGroup;
    }
}

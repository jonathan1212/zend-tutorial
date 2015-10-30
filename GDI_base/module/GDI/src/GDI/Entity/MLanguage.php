<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MLanguage
 *
 * @ORM\Table(name="m_language", uniqueConstraints={@ORM\UniqueConstraint(name="name_en", columns={"name_en"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MLanguageRepository")
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015

 */
class MLanguage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $languageId;

    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\MUser", mappedBy="language", cascade={"persist"})
     */
    protected  $MUser_languageid;
    /**
     * @var string
     *
     * @ORM\Column(name="name_en", type="string", length=30, nullable=false)
     */
    protected $nameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="name_native", type="string", length=30, nullable=false)
     */
    protected $nameNative;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=5, nullable=false)
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="resource", type="string", length=5, nullable=false)
     */
    protected $resource;

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
     * Get languageId
     *
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * Set nameEn
     *
     * @param string $nameEn
     *
     * @return MLanguage
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * Set nameNative
     *
     * @param string $nameNative
     *
     * @return MLanguage
     */
    public function setNameNative($nameNative)
    {
        $this->nameNative = $nameNative;

        return $this;
    }

    /**
     * Get nameNative
     *
     * @return string
     */
    public function getNameNative()
    {
        return $this->nameNative;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return MLanguage
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set resource
     *
     * @param string $resource
     *
     * @return MLanguage
     */
    public function setResource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Get resource
     *
     * @return string
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MLanguage
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
     * @return MLanguage
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
     * @return MLanguage
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
     * @return MLanguage
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
     * @return MLanguage
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->MUser_languageid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mUserLanguageid
     *
     * @param \GDI\Entity\MUser $mUserLanguageid
     *
     * @return MLanguage
     */
    public function addMUserLanguageid(\GDI\Entity\MUser $mUserLanguageid)
    {
        $this->MUser_languageid[] = $mUserLanguageid;

        return $this;
    }

    /**
     * Remove mUserLanguageid
     *
     * @param \GDI\Entity\MUser $mUserLanguageid
     */
    public function removeMUserLanguageid(\GDI\Entity\MUser $mUserLanguageid)
    {
        $this->MUser_languageid->removeElement($mUserLanguageid);
    }

    /**
     * Get mUserLanguageid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMUserLanguageid()
    {
        return $this->MUser_languageid;
    }
}

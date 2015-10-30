<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * MUser
 *
 * @ORM\Table(name="m_user", uniqueConstraints={@ORM\UniqueConstraint(name="email_address", columns={"email_address"})}, indexes={@ORM\Index(name="m_user_fi1", columns={"branch_id"}), @ORM\Index(name="m_user_fi2", columns={"language_id"})})
 * @ORM\Entity(repositoryClass="GDI\Repository\MUserRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class MUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $userId;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MBranch", inversedBy="MUser_branch", cascade={"persist"})
     * @ORM\JoinColumn(name="branch_id", referencedColumnName="branch_id", unique=false, nullable=true)
     */
    protected $branch;

    /**
     * @ORM\ManyToOne(targetEntity="GDI\Entity\MLanguage", inversedBy="MUser_languageid", cascade={"persist"})
     * @ORM\JoinColumn(name="language_id", referencedColumnName="language_id", unique=false, nullable=true)
     */
    protected $language;
    /**
     * @ORM\OneToMany(targetEntity="GDI\Entity\RUserRole", mappedBy="user", cascade={"persist"})
     */
    protected $rUserRoleUserId;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50, nullable=false)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=false)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=100, nullable=false)
     */
    protected $emailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false)
     */
    protected $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="branch_id", type="integer", nullable=false)
     */
    protected $branchId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     */
    protected $languageId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pw_error_count", type="boolean", nullable=false)
     */
    protected $pwErrorCount = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    protected $isActive = '0';

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
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return MUser
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return MUser
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     *
     * @return MUser
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return MUser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set branchId
     *
     * @param integer $branchId
     *
     * @return MUser
     */
    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;

        return $this;
    }

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
     * Set languageId
     *
     * @param integer $languageId
     *
     * @return MUser
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

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
     * Set pwErrorCount
     *
     * @param boolean $pwErrorCount
     *
     * @return MUser
     */
    public function setPwErrorCount($pwErrorCount)
    {
        $this->pwErrorCount = $pwErrorCount;

        return $this;
    }

    /**
     * Get pwErrorCount
     *
     * @return boolean
     */
    public function getPwErrorCount()
    {
        return $this->pwErrorCount;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return MUser
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return MUser
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
     * @return MUser
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
     * Set updateUserId
     *
     * @param integer $updateUserId
     *
     * @return MUser
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
     * @return MUser
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
        $this->rUserRoleUserId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rUserRoleUserId
     *
     * @param \GDI\Entity\RUserRole $rUserRoleUserId
     *
     * @return MUser
     */
    public function addRUserRoleUserId(\GDI\Entity\RUserRole $rUserRoleUserId)
    {
        $this->rUserRoleUserId[] = $rUserRoleUserId;

        return $this;
    }

    /**
     * Remove rUserRoleUserId
     *
     * @param \GDI\Entity\RUserRole $rUserRoleUserId
     */
    public function removeRUserRoleUserId(\GDI\Entity\RUserRole $rUserRoleUserId)
    {
        $this->rUserRoleUserId->removeElement($rUserRoleUserId);
    }

    /**
     * Get rUserRoleUserId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRUserRoleUserId()
    {
        return $this->rUserRoleUserId;
    }



    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return MUser
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
     * Set branch
     *
     * @param \GDI\Entity\MBranch $branch
     *
     * @return MUser
     */
    public function setBranch(\GDI\Entity\MBranch $branch)
    {
        $this->branch = $branch;

        return $this;
    }

    /**
     * Get branch
     *
     * @return \GDI\Entity\MBranch
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * Set language
     *
     * @param \GDI\Entity\MLanguage $language
     *
     * @return MUser
     */
    public function setLanguage(\GDI\Entity\MLanguage $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \GDI\Entity\MLanguage
     */
    public function getLanguage()
    {
        return $this->language;
    }
}

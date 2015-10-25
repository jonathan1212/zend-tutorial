<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Application\Repository\UserRepository")
 * @Annotation\Name("user") 
 */
class User 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Annotation\Attributes({"type":"hidden"})
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     * @Annotation\Attributes({"type":"text", "class":"test"})
     * @Annotation\Options({"label":"Code:"})
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=100, nullable=true)
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":30}})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"address:"})
     *   
     */
    protected $address;
    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     */
    protected $languageId;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Language")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     * })
     * 
     * sample
     * 
     * Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * Annotation\Options({"label":"language", 
     *   "object_manager":"Doctrine\Common\Persistence\ObjectManager" ,
     *   "target_class":"Application\Entity\Language"
     * })
     */
    protected $language;


    /**
     * @var integer
     *
     * @ORM\Column(name="place_id", type="integer", nullable=false)
     */
    protected $placeId;

    /**
     * @ORM\OneToOne(targetEntity="Application\Entity\Place", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="place_id", referencedColumnName="id")
     * })
     * 
     */
    protected $place;



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
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set languageId
     *
     * @param integer $languageId
     *
     * @return User
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
     * Set placeId
     *
     * @param integer $placeId
     *
     * @return User
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;

        return $this;
    }

    /**
     * Get placeId
     *
     * @return integer
     */
    public function getPlaceId()
    {
        return $this->placeId;
    }

    /**
     * Set language
     *
     * @param \Application\Entity\Language $language
     *
     * @return User
     */
    public function setLanguage(\Application\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Application\Entity\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set place
     *
     * @param \Application\Entity\Place $place
     *
     * @return User
     */
    public function setPlace(\Application\Entity\Place $place = null)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return \Application\Entity\Place
     */
    public function getPlace()
    {
        return $this->place;
    }
}

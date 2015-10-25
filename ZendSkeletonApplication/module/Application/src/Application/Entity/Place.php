<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;


/**
 * Place
 *
 * @ORM\Table(name="place")
 * @ORM\Entity(repositoryClass="Application\Repository\PlaceRepository")
 * 
 * @Annotation\Name("place")
 * @Annotation\Type("fieldset")
 */
class Place
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
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=100, nullable=false)
     * @Annotation\Attributes({"type":"text", "class":"form-control"})
     * @Annotation\Options({"label":"Place:"})
     */
    protected $place;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=100, nullable=false)
     * @Annotation\Attributes({"type":"text", "class":"form-control"})
     * @Annotation\Options({"label":"Country:"})
     * @Annotation\Required(true)
     * @Annotation\Validator({"name":"StringLength","options":{"min":"1", "max":"20"}})
     * 
     */
    protected $country;

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
     * Set place
     *
     * @param string $place
     *
     * @return Place
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}

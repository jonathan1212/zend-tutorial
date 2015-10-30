<?php

namespace GDI\Form;

class Category
{
    /**
     * @var string
     */
    protected $name;


    protected $last;

    /**
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    public function setLast($name)
    {
        $this->last = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLast()
    {
        return $this->last;
    }

    protected $eSubmissionDate;


    /**
     * Set eSubmissionDate
     *
     * @param \DateTime $eSubmissionDate
     *
     * @return TJurisdictionProduct
     */
    public function setESubmissionDate($eSubmissionDate)
    {
        $this->eSubmissionDate = $eSubmissionDate;

        return $this;
    }

    /**
     * Get eSubmissionDate
     *
     * @return \DateTime
     */
    public function getESubmissionDate()
    {
        return $this->eSubmissionDate;
    }
}
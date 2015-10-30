<?php

namespace GDI\Entity\Custom;


class JurProductCustom {

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
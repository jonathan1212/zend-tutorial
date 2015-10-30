<?php

namespace GDI\Model;
use GDI\Entity\MJurisdiction;
/**
 * MJurisdictionModel
 *
 * Model methods below.
 */
class MJurisdictionModel extends MJurisdiction
{
    public function exchangeArray($data)
    {
        $this->jurisdictionId     = (!empty($data['jurisdiction_id'])) ? $data['jurisdiction_id'] : null;
        $this->jurisdictionName = (!empty($data['jurisdiction_name'])) ? $data['jurisdiction_name'] : null;
        $this->jurisdictionAbbr = (!empty($data['jurisdiction_abbr'])) ? $data['jurisdiction_abbr'] : null;
        $this->isRegulator = (!empty($data['is_regulator'])) ? $data['is_regulator'] : null;

        $this->isDeleted  = (!empty($data['is_deleted'])) ? $data['is_deleted'] : null;
        $this->createUserId  = (!empty($data['create_user_id'])) ? $data['create_user_id'] : null;
        $this->createTime  = (!empty($data['create_time'])) ? $data['create_time'] : null;
        $this->updateUserId  = (!empty($data['update_user_id'])) ? $data['update_user_id'] : null;
        $this->updateTime  = (!empty($data['update_time'])) ? $data['update_time'] : null;

    }

    // Add the following method:
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}

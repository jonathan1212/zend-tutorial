<?php

namespace GDI\Model;
use GDI\Entity\MMarket;
/**
 * MMarket
 *
 * Model methods below.
 */
class MMarketModel extends MMarket
{
    public function exchangeArray($data)
    {
        $this->marketId     = (!empty($data['market_id'])) ? $data['market_id'] : null;
        $this->marketName = (!empty($data['market_name'])) ? $data['market_name'] : null;
        $this->marketAbbr = (!empty($data['market_abbr'])) ? $data['market_abbr'] : null;
        $this->criterionJurisdictionId = (!empty($data['criterion_jurisdiction_id'])) ? $data['criterion_jurisdiction_id'] : null;

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

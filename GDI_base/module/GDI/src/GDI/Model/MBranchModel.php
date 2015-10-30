<?php

namespace GDI\Model;

use GDI\Entity\MBranch;
/**
 * MBranchModel
 *
 * Model methods below.
 */

class MBranchModel extends MBranch
{

    public function exchangeArray($data)
    {
        $this->branchId     = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->branchName = (!empty($data['branch_name'])) ? $data['branch_name'] : null;
        $this->branchAbbr  = (!empty($data['branch_abbr'])) ? $data['branch_abbr'] : null;
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

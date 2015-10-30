<?php

namespace GDI\Model;
use GDI\Entity\MGameCategory;

/**
 * MGameCategoryModel
 *
 * Model methods below.
 */
class MGameCategoryModel extends MGameCategory
{
    public function exchangeArray($data)
    {
        $this->gameCategoryId     = (!empty($data['game_category_id'])) ? $data['game_category_id'] : null;
        $this->gameCategoryName = (!empty($data['game_category_name'])) ? $data['game_category_name'] : null;

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

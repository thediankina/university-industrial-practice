<?php

namespace frontend\models;

use yii\db\ActiveRecord;

/**
 * Description of Photo
 *
 * @author Diana Galiulina
 */
class Photo extends ActiveRecord
{
    public static function tableName()
    {
        return '{{photo}}';
    }
    
    public function rules()
    {
        return [
            ['album_id', 'required'],
            ['name', 'required'],
        ];
    }
}

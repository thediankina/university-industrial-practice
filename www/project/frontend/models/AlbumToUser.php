<?php

namespace frontend\models;

use yii\db\ActiveRecord;

/**
 * Description of Album
 *
 * @author Diana Galiulina
 */
class AlbumToUser extends ActiveRecord
{
    public static function tableName()
    {
        return '{{album_to_user}}';
    }
    
    public function rules()
    {
        return [
            ['user_id', 'required'],
        ];
    }
}

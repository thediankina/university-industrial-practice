<?php

namespace frontend\models;

use yii\db\ActiveRecord;

/**
 * AlbumToUser model class for table "album_to_user"
 *
 * @property integer $id
 * @property integer $album_id
 * @property integer $user_id
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

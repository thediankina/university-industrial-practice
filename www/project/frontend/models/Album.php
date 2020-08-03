<?php

namespace frontend\models;

use yii\db\ActiveRecord;

/**
 * Album model class for table "album"
 *
 * @property integer $id
 * @property string $name
 * @property string $preview
 * @property integer $number_of_photos
 * 
 * @author Diana Galiulina
 */
class Album extends ActiveRecord
{
    // default image is located in uploads
    const DEFAULT_IMAGE = 'none.jpg';
    
    public static function tableName()
    {
        return '{{album}}';
    }
    
    public function rules()
    {
        return [
            ['name', 'required'],
        ];
    }
}

<?php

namespace frontend\models;

use yii\db\ActiveRecord;

/**
 * Photo model class for table "photo"
 *
 * @property integer $id
 * @property integer $album_id
 * @property string $name
 * 
 * @author Diana Galiulina
 */
class Photo extends ActiveRecord
{
    public static function tableName()
    {
        return '{{photo}}';
    }
    
    public function attributeLabels()
    {
        return [
            'album_id' => 'album_id',
            'name' => 'name',
        ];
    }
    
    public function rules()
    {
        return [
            ['album_id', 'required'],
            ['name', 'required'],
        ];
    }
}

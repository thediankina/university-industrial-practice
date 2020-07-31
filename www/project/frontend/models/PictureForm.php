<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class PictureForm extends Model {

    public $picture;

    public function rules() {
        return [
            [['picture'], 'file',
                'extensions' => ['jpg'],
                'checkExtensionByMimeType' => true
            ],
        ];
    }

}

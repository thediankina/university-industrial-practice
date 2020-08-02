<?php

namespace frontend\controllers;

use frontend\models\Photo;
use frontend\models\Album;

class PhotoController extends \yii\web\Controller
{
    public function actionView($id, $name)
    {
        $conditions = ['album_id' => $id];
        $photoList = Photo::find()->where($conditions)->all();
        return $this->render('view', [
            'name' => $name,
            'photoList' => $photoList,
        ]);
    }
}


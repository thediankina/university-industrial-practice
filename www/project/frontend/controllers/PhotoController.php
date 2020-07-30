<?php

namespace frontend\controllers;

use frontend\models\Photo;

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


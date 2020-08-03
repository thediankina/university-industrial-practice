<?php

namespace frontend\controllers;

use frontend\models\Photo;

/**
 * Photo controller
 */
class PhotoController extends \yii\web\Controller
{
    /**
     * View photo
     * @param integer $id
     * @param string $name
     * @return mixed
     */
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


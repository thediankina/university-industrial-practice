<?php

namespace frontend\controllers;

use frontend\models\Photo;

class AlbumController extends \yii\web\Controller {

    public function actionView($id, $name) {
        $conditions = ['album_id' => $id];
        $photoList = Photo::find()->where($conditions)->all();
        if ($photoList) {
            $photoExist = true;

            return $this->render('view', [
                        'photoList' => $photoList,
                        'photoExist' => $photoExist,
                        'name' => $name,
            ]);
        } else {
            $photoExist = false;

            return $this->render('view', [
                        'photoExist' => $photoExist,
                        'name' => $name,
            ]);
        }
    }

}

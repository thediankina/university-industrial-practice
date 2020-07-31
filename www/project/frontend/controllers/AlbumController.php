<?php

namespace frontend\controllers;

use frontend\models\Photo;
use frontend\models\PictureForm;
use yii\web\UploadedFile;
use yii\web\Response;


class AlbumController extends \yii\web\Controller {

    public function actionView($id, $name) {

        $modelPicture = new PictureForm();

        $conditions = ['album_id' => $id];
        $photoList = Photo::find()->where($conditions)->all();
        if ($photoList) {
            $photoExist = true;

            return $this->render('view', [
                        'photoList' => $photoList,
                        'photoExist' => $photoExist,
                        'name' => $name,
                        'modelPicture' => $modelPicture,
            ]);
        } else {
            $photoExist = false;

            return $this->render('view', [
                        'photoExist' => $photoExist,
                        'name' => $name,
                        'modelPicture' => $modelPicture,
            ]);
        }
    }
    
    public function actionUploadPicture()
    {
        $model = new PictureForm();
        $model->picture = UploadedFile::getInstance($model, 'picture');
        
        if ($model->validate()) {
            echo 'ok';
        }
        else {
            print_r($model->getErrors());
        }
    }

}

<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Album;
use frontend\models\Photo;
use frontend\models\PictureForm;
use yii\web\UploadedFile;


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
                        'id' => $id,
                        'modelPicture' => $modelPicture,
            ]);
        } else {
            $photoExist = false;

            return $this->render('view', [
                        'photoExist' => $photoExist,
                        'name' => $name,
                        'id' => $id,
                        'modelPicture' => $modelPicture,
            ]);
        }
    }
    
    public function actionUploadPicture($id) {
        $model = new PictureForm();
        $model->picture = UploadedFile::getInstance($model, 'picture');

        if ($model->validate()) {

            $albumId = $id;
            $pictureUri = Yii::$app->storage->saveUploadedFile($model->picture);
            $photo = new Photo();
            $photo->album_id = $albumId;
            $photo->name = $pictureUri;
            $photo->save();
            
        } else {
            print_r($model->getErrors());
        }
    }
}

<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Photo;
use frontend\models\Album;
use frontend\models\PictureForm;
use yii\web\UploadedFile;
use yii\web\Response;

/**
 * Album controller
 */
class AlbumController extends \yii\web\Controller {
    
    /**
     * Prepare data for album view
     * @param integer $id
     * @param string $name
     * @return mixed
     */
    public function actionView($id, $name) {

        $modelPicture = new PictureForm();
        // Search photos which have such album id
        $conditions = ['album_id' => $id];
        $photoList = Photo::find()->where($conditions)->all();
        // If found or didn't find some photos
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
    
    /**
     * Upload photo via ajax request
     * @param integer $id
     * @return mixed
     */
    public function actionUploadPicture($id) {
        
        Yii::$app->response->format = Response::FORMAT_JSON;
        // Upload image oblect
        $model = new PictureForm();
        $model->picture = UploadedFile::getInstance($model, 'picture');

        if ($model->validate()) {
            $albumId = $id;
            $pictureUri = Yii::$app->storage->saveUploadedFile($model->picture);
            // Save info in db
            $photo = new Photo();
            $photo->album_id = $albumId;
            $photo->name = $pictureUri;
            $photo->save();
            // If album was empty, change album preview
            $checkAlbumPreview = Album::findOne($albumId);
            if ($checkAlbumPreview->preview === Album::DEFAULT_IMAGE){
                $checkAlbumPreview->preview = $photo->name;
                $checkAlbumPreview->update();
            }
            return ['success' => true,
                'pictureUri' => Yii::$app->storage->getFile($photo->name)];
        }
        return ['success' => false, 'errors' => $model->getErrors()];
    }
}

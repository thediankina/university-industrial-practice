<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Album;
use frontend\models\AlbumToUser;

/**
 * Gallery controller
 */
class GalleryController extends \yii\web\Controller {
    
    /**
     * Prepare data for gallery view
     * @return mixed
     */
    public function actionIndex() {
        
        $user = Yii::$app->user->id;
        // Search albums ids which this user has
        $condition = ['user_id' => $user];
        $albumIdsList = AlbumToUser::find()->where($condition)->all();
        // Search albums with such ids
        $conditions = [];
        foreach ($albumIdsList as $albumId):
            $albumIdstring = $albumId->album_id;
            array_push($conditions, $albumIdstring);
        endforeach;
        $albumList = Album::find()->where(['id' => $conditions]);
        // If found or didn't find some albums
        if ($albumIdsList) {
            $albumList = $albumList->all();
            $albumExist = true;

            return $this->render('index', [
                        'albumList' => $albumList,
                        'albumExist' => $albumExist,
            ]);
        } else {
            $albumExist = false;

            return $this->render('index', [
                        'albumExist' => $albumExist,
            ]);
        }
    }
    
    /**
     * Create new album
     * @return mixed
     */
    public function actionCreate() {
        
        $newAlbum = new Album();
        
        if ($newAlbum->load(Yii::$app->request->post())) {
            $newAlbum->preview = Album::DEFAULT_IMAGE;
            $newAlbum->save();
            // Create connection with user
            $albumToUser = new AlbumToUser();
            $albumToUser->album_id = $newAlbum->id;
            $albumToUser->user_id = Yii::$app->user->id;
            $albumToUser->save();

            Yii::$app->session->setFlash('success', 'Saved.');
            return $this->redirect(['gallery/index']);
        }
        
        return $this->render('create', [
                    'album' => $newAlbum,
        ]);
    }
}

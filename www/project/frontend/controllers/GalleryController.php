<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Album;
use frontend\models\AlbumToUser;

class GalleryController extends \yii\web\Controller
{
    public function actionIndex() {
        $user = Yii::$app->user->id;
        $conditions = ['user_id' => $user];
        $albumIdsList = AlbumToUser::find()->where($conditions)->all();
        $condition = [];
        foreach ($albumIdsList as $albumId):
            $albumIdstring = $albumId->album_id;
            array_push($condition, $albumIdstring);
        endforeach;
        $albumList = Album::find()->where(['id' => $condition]);
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

    public function actionCreate() {
        $newAlbum = new Album();
        
        if ($newAlbum->load(Yii::$app->request->post())) {
            $newAlbum->preview = Album::DEFAULT_IMAGE;
            $newAlbum->save();
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

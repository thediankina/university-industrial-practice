<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Album;
use frontend\models\AlbumToUser;

class GalleryController extends \yii\web\Controller
{
    public function actionIndex() {
        $user = Yii::$app->user->id;    // Get current user id
        $conditions = ['user_id' => $user];
        $albumIdsList = AlbumToUser::find()->where($conditions)->all();
        foreach ($albumIdsList as $albumId):
            $albumList = Album::find()->where(['id' => $albumId]);
        endforeach;
        if ($albumList) {
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

    public function actionCreate()
    {
        $album = new Album();
        if ($album->load(Yii::$app->request->post()) && $album->save()) {
            Yii::$app->session->setFlash('success', 'Saved.');
            return $this->redirect(['gallery/index']);
        }
        return $this->render('create', [
            'album' => $album,
        ]);
    }

}

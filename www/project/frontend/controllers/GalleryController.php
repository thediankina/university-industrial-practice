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
        $newalbum = new Album();
        
        if ($newalbum->load(Yii::$app->request->post())) {
            $newalbum->save();
            $albumtouser = new AlbumToUser();
            $albumtouser->album_id = $newalbum->id;
            $albumtouser->user_id = Yii::$app->user->id;
            $albumtouser->save();

            Yii::$app->session->setFlash('success', 'Saved.');
            return $this->redirect(['gallery/index']);
        }
        
        return $this->render('create', [
                    'album' => $newalbum,
        ]);
    }
}

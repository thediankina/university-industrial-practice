<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Album;

class GalleryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $conditions = ['id' => 1];
        $albumList = Album::find()->where($conditions)->all();
        
        return $this->render('index', [
            'albumList' => $albumList,
        ]);
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

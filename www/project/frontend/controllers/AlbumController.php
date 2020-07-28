<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class AlbumController extends Controller
{
    public function actionView($id)
    {
        return $this->render('view');
    }
}


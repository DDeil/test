<?php

namespace app\controllers;

use app\form\LinksForm;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new LinksForm();
        return $this->render('index', ['model' => $model]);
    }
}

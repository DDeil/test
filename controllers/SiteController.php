<?php

namespace app\controllers;

use app\form\LinksForm;
use app\service\SaveLinkService;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $model = new LinksForm();

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->validate()) {
            (new SaveLinkService($model))->process();
        }

        return $this->render('index', ['model' => $model]);
    }
}

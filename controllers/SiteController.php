<?php

namespace app\controllers;

use app\form\LinksForm;
use app\models\Links;
use app\search\LinksSearch;
use app\service\SaveLinkService;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{

    /**
     * @return \string[][]
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => '/error',
            ],
        ];
    }

    /**
     * @return string
     * @throws Exception
     */
    public function actionIndex(): string
    {
        $model   = new LinksForm();
        $request = Yii::$app->getRequest();

        if ($model->load($request->post()) && $model->validate()) {
            (new SaveLinkService($model))->process();
        }

        $searchModel = new LinksSearch();
        $dataProvider = $searchModel->search($request->getQueryParams());

        return $this->render('index', [
            'model'        => $model,
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    /**
     * @param $token
     * @throws NotFoundHttpException
     */
    public function actionGo($token)
    {
        $model = Links::findOne(['token' => $token]);

        if (!$model) {
            throw new NotFoundHttpException();
        }

        $endTime     = (new \DateTime($model->created_at))->getTimestamp() + $model->life_time;
        $currentTime = (new \DateTime())->getTimestamp();

        if ($endTime < $currentTime) {
            throw new NotFoundHttpException();
        }

        if ($model->redirect_limit && $model->count_redirect >= $model->redirect_limit) {
            throw new NotFoundHttpException();
        }

        $model->count_redirect++;
        $model->save();

        $this->redirect($model->url);
    }

}

<?php

namespace app\service;

use app\form\LinksForm;
use app\models\Links;
use yii\base\Exception;

class SaveLinkService
{

    /** @var LinksForm */
    private $entity;

    public function __construct(LinksForm $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @throws Exception
     */
    public function process(): bool
    {
        if (!$this->entity->validate()) {
            return false;
        }

        do {
            $token = \Yii::$app->security->generateRandomString(Links::TOKEN_LENGTH);
        } while(Links::find()->where(['token' => $token])->exists());

        $model = new Links();

        $model->url            = $this->entity->url;
        $model->life_time      = $this->entity->lifeTime;
        $model->redirect_limit = $this->entity->redirectLimit;
        $model->token          = $token;

        return $model->save();
    }
}
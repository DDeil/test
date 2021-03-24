<?php

namespace app\service;

use app\form\LinksForm;
use app\models\Links;

class SaveLinkService
{

    /** @var LinksForm */
    private $entity;

    public function __construct(LinksForm $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function process(): bool
    {
        if (!$this->entity->validate()) {
            return false;
        }

        do {
            $token = strtr(\Yii::$app->security->generateRandomString(Links::TOKEN_LENGTH), '-_', 'rT');
        } while(Links::find()->where(['token' => $token])->exists());

        $model = new Links();

        $model->url            = $this->entity->url;
        $model->life_time      = $this->entity->lifeTimeInSecond;
        $model->redirect_limit = $this->entity->redirectLimit;
        $model->token          = $token;
        $model->created_at     = (new \DateTime())->format('Y-m-d H:i:s');

        return $model->save();
    }
}
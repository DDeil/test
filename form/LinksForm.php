<?php

namespace app\form;

use yii\base\Model;

class LinksForm extends Model
{

    public $url;
    public $lifeTime;
    public $redirectLimit;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ['url', 'string', 'length' => [0, 256]],
            [['lifeTime', 'redirectLimit'], 'integer'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'url'           => 'Адресс',
            'lifeTime'      => 'Время жизни',
            'redirectLimit' => 'Лимит переходов',
        ];
    }
}
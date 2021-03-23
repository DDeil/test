<?php

namespace app\form;

use yii\base\Model;

class LinksForm extends Model
{

    public $url;
    public $lifeTime;
    public $redirectLimit;

    public function rules()
    {
        return [
            ['url', 'string', 'length' => [0, 256]],
            [['lifeTime', 'redirectLimit'], 'integer'],
        ];
    }
}
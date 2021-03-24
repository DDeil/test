<?php

namespace app\form;

use yii\base\Model;

class LinksForm extends Model
{

    public $url;
    public $lifeTime;
    public $redirectLimit;
    public $lifeTimeInSecond;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ['url', 'string', 'length' => [0, 256]],
            ['url', 'url'],
            ['redirectLimit', 'integer', 'min' => 0],
            ['lifeTime', 'time', 'timestampAttribute' => 'lifeTimeInSecond','format' => 'HH:mm:ss', 'message' => 'Неверный формат времени! Формат: HH:MM:SS'],
            [['lifeTime', 'url', 'redirectLimit'], 'required'],
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
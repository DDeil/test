<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 *
 * Class Links
 * @package app\models
 *
 * @property integer    $id
 * @property string     $url
 * @property integer    $redirect_limit
 * @property integer    $life_time
 * @property integer    $count_redirect
 * @property string     $token
 * @property \DateTime  $created_at
 *
 */

class Links extends ActiveRecord
{

    public const TOKEN_LENGTH = 8;

    public static function tableName()
    {
        return 'links';
    }

    public function rules()
    {
        return [
            [['id', 'redirect_limit', 'life_time', 'count_redirect'], 'integer'],
            ['url', 'string', 'length' => [0, 256]],
            ['token', 'string', 'length' => [0, 8]],
        ];
    }
}
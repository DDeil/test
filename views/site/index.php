<?php

/**
 *
 * @var LinksForm               $model
 * @var ActiveDataProvider      $dataProvider
 * @var LinksSearch             $searchModel
 *
 */

use app\form\LinksForm;
use app\search\LinksSearch;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

$this->title = 'Links';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-lg-12">
                <?= $form->field($model, 'url')->textInput()?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'lifeTime')->textInput()?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'redirectLimit')->textInput()?>
            </div>
            <div class="jumbotron">
                <?= Html::submitButton('Создать', ['class' => 'btn-lg btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

        <div class="row">
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $searchModel,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'url',
                        'redirect_limit',
                        [
                            'label' => 'Life time',
                            'value' => function($model) {
                                /** @var LinksSearch $model */
                                return (new DateTime())->setTimestamp($model->life_time)->format('H:i:s') ;
                            },
                        ],
                        'count_redirect',
                        'token',
                    ],
                                 ]) ?>
        </div>
    </div>
</div>

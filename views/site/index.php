<?php

/**
 * @var $this yii\web\View
 * @var LinksForm $model
 */

use app\form\LinksForm;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = 'My Yii Application';
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
    </div>
</div>

<?php

use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Reviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput([
        'maxlength' => true,
        'value' => Yii::$app->user->identity->username,
        'readonly' => true,
    ]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'date')->widget(DateControl::classname(), [
        'type' => 'date',
    ]) ?>

    <?= $form->field($model, 'status_active')->dropDownList([0 => 'неактивный', 1 => 'активный']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <? ?>

    <?php ActiveForm::end(); ?>

</div>

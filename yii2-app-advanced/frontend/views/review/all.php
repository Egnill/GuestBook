<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;

/* @var $reviews common\models\Reviews */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'My Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="flex-column">
    <?php foreach ($reviews as $note): ?>
        <?php if (Yii::$app->user->identity->username == $note->user_name): ?>
            <div class="col-lg-12">
                <h2><?= Html::a(Html::encode($note->user_name), ['one', 'id' => $note->id], ['class' => 'profile-link']) ?></h2>
                <?= $note->text ?>
                <br>
                <?= Html::a('Like: ' . $note->number_likes, ['like-review', 'id' => $note->id], ['class' => 'btn btn-success pull-right']) ?>
            </div>
        <?php endif; ?>
    <?php endforeach ?>
</div>
<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;

/* @var $review common\models\Reviews */
/* @var $form yii\widgets\ActiveForm */
/* @var $comment common\models\Comment */
/* @var $commentForm common\models\CommentForm */

$this->title = 'Review';
?>
    <h2><?= $review->user_name ?></h2>
<?= $review->text ?>
    <br>
<?= $this->render('..\comment\comment', [
    'review' => $review,
    'comments' => $comment,
    'commentForm' => $commentForm
]); ?>
    <br>
<?php if (!Yii::$app->user->isGuest): ?>
    <?= Html::a('Back', ['../review'], ['class' => 'btn btn-success btn-lg']) ?>
<?php else: ?>
    <?= Html::a('Back', ['../site/index'], ['class' => 'btn btn-success btn-lg']) ?>
<?php endif; ?>
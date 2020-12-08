<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $reviews \common\models\Reviews */

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Reviews!</h1>
    </div>

    <div class="body-content">

        <div class="flex-column">
            <?php foreach ($reviews as $note): ?>
                <div class="col-lg-12">
                    <h2><?= Html::a(Html::encode($note->user_name), ['review/one', 'id' => $note->id], ['class' => 'profile-link']) ?></h2>
                    <?= $note->text ?>
                    <br>
                    <?= Html::a('Like: ' . $note->number_likes, ['../review/like-review', 'id' => $note->id, 'url' => '../site/index'], ['class' => 'btn btn-success pull-right']) ?>
                </div>
            <?php endforeach ?>
        </div>

    </div>
</div>

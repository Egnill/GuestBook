<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\bootstrap\Html;

/* @var $review common\models\Reviews */
/* @var $comments common\models\Comment */
/* @var $commentForm common\models\CommentForm */

?>
<?php if (!empty($comments)): ?>

    <?php foreach ($comments as $comment): ?>
        <div class="bottom-comment"><!--bottom comment-->
            <!--<div class="comment-img">
                <img width="50" class="img-circle" src="<? /*= $comment->user->image; */ ?>" alt="">
            </div>-->

            <div class="comment-text col-lg-12">
                <div class="btn pull-right">
                    <button type="submit" class="replay btn pull-right">Replay</button>
                </div>

                <p class="comment-date">
                    <?= $comment->getDate(); ?>
                </p>

                <p class="para"><?= $comment->text; ?></p>
                <div class="btn pull-right">
                    <!--<div class="col">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hand-thumbs-up"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16v-1c.563 0 .901-.272 1.066-.56a.865.865 0 0 0 .121-.416c0-.12-.035-.165-.04-.17l-.354-.354.353-.354c.202-.201.407-.511.505-.804.104-.312.043-.441-.005-.488l-.353-.354.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315L12.793 9l.353-.354c.353-.352.373-.713.267-1.02-.122-.35-.396-.593-.571-.652-.653-.217-1.447-.224-2.11-.164a8.907 8.907 0 0 0-1.094.171l-.014.003-.003.001a.5.5 0 0 1-.595-.643 8.34 8.34 0 0 0 .145-4.726c-.03-.111-.128-.215-.288-.255l-.262-.065c-.306-.077-.642.156-.667.518-.075 1.082-.239 2.15-.482 2.85-.174.502-.603 1.268-1.238 1.977-.637.712-1.519 1.41-2.614 1.708-.394.108-.62.396-.62.65v4.002c0 .26.22.515.553.55 1.293.137 1.936.53 2.491.868l.04.025c.27.164.495.296.776.393.277.095.63.163 1.14.163h3.5v1H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                        </svg>
                    </div>-->
                    <!--<p class="col"><? /*= $comment->number_likes; */ ?></p>-->
                    <?= Html::a('Like: ' . $comment->number_likes, ['../review/like-comment', 'id' => $comment->id], ['class' => 'btn btn-success pull-right']) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

<?php endif; ?>
<!-- end bottom comment-->

<?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->username == $review->user_name): ?>
    <div class="leave-comment"><!--leave comment-->
        <h4>Leave a reply</h4>
        <?php if (Yii::$app->session->getFlash('comment')): ?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('comment'); ?>
            </div>
        <?php endif; ?>
        <?php $form = ActiveForm::begin([
            //'method' => 'post',
            'action' => ['comment', 'id' => $review->id],
            'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form']]) ?>
        <div class="form-group">
            <div class="col-md-12">
                <?= $form->field($commentForm, 'text')->textarea(['rows' => 6, 'class' => 'form-control', 'placeholder' => 'Write Message'])->label(false) ?>
            </div>
        </div>
        <button type="submit" class="btn send-btn">Post Comment</button>
        <?php ActiveForm::end(); ?>
    </div><!--end leave comment-->
<?php endif; ?>

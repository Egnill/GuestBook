<?php

namespace frontend\controllers;

use common\models\CommentForm;
use common\models\Comment;
use common\models\Reviews;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Review controller
 */
class ReviewController extends Controller
{
    public function actionIndex()
    {
        $reviews = Reviews::find()->andWhere(['status_active' => 1])->all();
        return $this->render('all', [
            'reviews' => $reviews
        ]);
    }

    public function actionOne($id)
    {
        if ($review = Reviews::find()->andWhere(['id' => $id])->one()) {
            $comment = Comment::find()->andWhere(['id_review' => $id])->all();
            $commentForm = new CommentForm();
            return $this->render('one', [
                'review' => $review,
                'comment' => $comment,
                'commentForm' => $commentForm
            ]);
        }
        throw new NotFoundHttpException();
    }

    public function actionCreate()
    {
        $model = new Reviews();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->save();
            Yii::$app->getSession()->setFlash('review', 'Thanks for review!');
            return $this->redirect(['create']);
        }

        Yii::$app->getSession()->setFlash('review', 'Leave your review!');
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionLikeComment($id)
    {
        $comment = Comment::find()->andWhere(['id' => $id])->one();
        $review = Reviews::find()->andWhere(['id' => $comment->id_review])->one();
        $comment->likeCounter();
        return $this->redirect(['one', 'id' => $review->id]);
    }

    public function actionLikeReview($id, $url = '../review')
    {
        $review = Reviews::find()->andWhere(['id' => $id])->one();
        $review->likeCounter();
        return $this->redirect([$url]);
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->saveComment($id)) {
                Yii::$app->getSession()->setFlash('comment', 'Thanks for comment!');
                return $this->redirect(['one', 'id' => $id]);
            } else {
                Yii::$app->getSession()->setFlash('comment', 'Comment don\'t save');
                return $this->redirect(['one', 'id' => $id]);
            }
        }
    }
}

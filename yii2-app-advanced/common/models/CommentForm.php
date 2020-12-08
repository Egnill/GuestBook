<?php

namespace common\models;

use yii\base\Model;
use Yii;

class CommentForm extends Model
{
    public $text;

    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string', 'length' => [0, 255]],
        ];
    }

    public function saveComment($id)
    {
        $comment = new Comment;
        $comment->id_review = $id;
        $comment->text = $this->text;
        $comment->date = date('Y-m-d');
        return $comment->save(false);
    }
}
<?php

namespace common\models;

use yii\base\Model;
use Yii;

class ReviewForm extends Model
{
    public $text;

    public function rules()
    {
        return [
            [['text'], 'string'],
            [['text', 'status_active'], 'required'],
            [['date'], 'safe'],
            [['number_likes', 'status_active'], 'integer'],
            [['user_name', 'image_way'], 'string', 'max' => 50],
        ];
    }

    public function saveReview()
    {
        $review = new Reviews();
        $review->text = $this->text;
        $review->date = date('Y-m-d');
        return $review->save(false);
    }
}
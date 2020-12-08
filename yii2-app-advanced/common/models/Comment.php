<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int|null $id_review
 * @property string|null $text
 * @property string|null $date
 * @property int|null $number_likes
 * @property int|null $status_active
 * @property string|null $image_way
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_review', 'number_likes', 'status_active'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['image_way'], 'string', 'max' => 50],
            [['id'], 'unique'],
            //[['id_review'], 'exist', 'skipOnError' => true, 'targetClass' => Reviews::className(), 'targetAttribute' => ['id_review' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_review' => 'Id Review',
            'text' => 'Text',
            'date' => 'Date',
            'number_likes' => 'Number Likes',
            'status_active' => 'Status Active',
            'image_way' => 'Image Way',
        ];
    }



    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public function likeCounter()
    {
        $this->number_likes += 1;
        return $this->save(false);
    }

    public function getReview()
    {
        return $this->hasOne(Reviews::className(), ['id_review' => 'id']);
    }
}

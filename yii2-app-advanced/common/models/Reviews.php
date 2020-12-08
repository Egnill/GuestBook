<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property string|null $user_name
 * @property string|null $text
 * @property string $date
 * @property int $number_likes
 * @property int $status_active
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['date'], 'safe'],
            [['number_likes', 'status_active'], 'integer'],
            [['user_name', 'image'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'Имя пользователя',
            'text' => 'Текст отзыва',
            'date' => 'Дата',
            'number_likes' => 'Число лайко',
            'status_active' => 'Статус',
            'image' => 'Изображение',
        ];
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id' => 'id_review']);
    }

    public function likeCounter()
    {
        $this->number_likes += 1;
        return $this->save(false);
    }
}

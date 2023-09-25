<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "practica_question_answer".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $post_id
 * @property int|null $question_id
 * @property string|null $answer_text
 * @property string|null $date
 */
class PracticaQuestionAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'practica_question_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'post_id', 'question_id'], 'integer'],
            [['date'], 'safe'],
            [['answer_text'], 'string', 'max' => 2000],
            [['answer_text'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'post_id' => 'Post ID',
            'question_id' => 'Question ID',
            'answer_text' => 'Javob matni',
            'date' => 'Date',
        ];
    }

    public function getUserAnswer()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getQuestion()
    {
        return $this->hasOne(PracticaQuestion::class, ['id' => 'question_id']);
    }
}

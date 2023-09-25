<?php

namespace common\models;

use kartik\date\DatePicker;
use Yii;

/**
 * This is the model class for table "theory_question_answer".
 *
 * @property int $id
 * @property int|null $post_id
 * @property int|null $user_id
 * @property DatePicker|null date
 * @property int|null $question_id
 * @property string|null $answer_text
 */
class TheoryQuestionAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theory_question_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'question_id'], 'integer'],
            [['answer_text'], 'string', 'max' => 2000],
            [['answer_text'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'question_id' => 'Question ID',
            'answer_text' => 'Javob matni',
        ];
    }

    public function getUserAnswer()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getQuestion()
    {
        return $this->hasOne(TheoryQuestion::class, ['id' => 'question_id']);
    }

}

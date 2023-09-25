<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "theory_question".
 *
 * @property int $id
 * @property int|null $post_id
 * @property int|null $user_id
 * @property string|null $image
 * @property string|null $question_text
 */
class TheoryQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theory_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'user_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['question_text'], 'string', 'max' => 2000],
            [['question_text'], 'required'],
            [['image'], 'file', 'extensions' => 'png, jpg, JPG', 'maxSize' => 1*(1024*1024)],
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
            'image' => 'Foto',
            'question_text' => 'Savol matni',
        ];
    }

    public function uploadImg($oldImage = null)
    {
        $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image)) {
            $this->image->saveAs('@frontend/web/question_img/' .'img_'.time() . '.' . $this->image->extension);
            $this->image = 'img_'.time().'.'.$this->image->extension;
        }else{
            $this->image = $oldImage;
        }
    }

    public function getUsers()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getQuestionAnswers()
    {
        return $this->hasMany(TheoryQuestionAnswer::class, ['question_id' => 'id']);
    }

}

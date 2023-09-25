<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "laboratory_question".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $post_id
 * @property string|null $image
 * @property string|null $question_text
 * @property string|null $date
 */
class LaboratoryQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratory_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'post_id'], 'integer'],
            [['date'], 'safe'],
            [['image'], 'string', 'max' => 255],
            [['question_text'], 'string', 'max' => 2000],
            [['question_text'], 'required']
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
            'image' => 'Foto',
            'question_text' => 'Savol matni',
            'date' => 'Date',
        ];
    }

    public function uploadImg($oldImage = null)
    {
        $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image)) {
            $this->image->saveAs('@frontend/web/laboratory_img/' .'img_'.time() . '.' . $this->image->extension);
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
        return $this->hasMany(LaboratoryQuestionAnswer::class, ['question_id' => 'id']);
    }
}

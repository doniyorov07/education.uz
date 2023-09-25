<?php

namespace backend\modules\testmanager\models;

use backend\modules\testmanager\models\traits\QuestionDynamicFormTrait;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property string $title
 * @property int|null $subject_id
 * @property int|null $status
 * @property int|null $user_id
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Option[] $options
 * @property Subject $subject
 */
class Question extends \yii\db\ActiveRecord
{

    use QuestionDynamicFormTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string'],
            [['subject_id', 'status', 'user_id', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Savol matni',
            'subject_id' => 'Fan',
            'subject.name' => 'Fan',
            'status' => Yii::t('app', 'Status'),
            'user_id' => Yii::t('app', 'User ID'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'user_id',
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Option::className(), ['question_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRandomOptions()
    {
        return $this->getOptions()->orderBy(new Expression('rand()'));
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }
}

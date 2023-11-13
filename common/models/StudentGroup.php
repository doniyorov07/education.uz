<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student_group".
 *
 * @property int $id
 * @property int|null $group_id
 * @property int|null $student_id
 *
 * @property Group $group
 * @property User $student
 */
class StudentGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function  tableName()
    {
        return 'student_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'student_id'], 'integer'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['student_id' => 'id']],
            [['group_id', 'student_id'], 'required', 'message' => 'Form bo]\'sh bo\'lmasligi kerak!']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Guruh nomi',
            'student_id' => 'Student FISH',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['id' => 'student_id']);
    }

    public function isDuplicateEntry()
    {
        $exists = StudentGroup::find()
            ->where(['student_id' => $this->student_id, 'group_id' => $this->group_id])
            ->exists();
        return $exists;
    }
}

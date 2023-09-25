<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "krossword".
 *
 * @property int $id
 * @property string|null $lesson_name
 * @property string|null $link
 * @property int|null $status
 */
class Krossword extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'krossword';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['lesson_name', 'link'], 'string', 'max' => 500],
            [['lesson_name', 'link'], 'required', 'message' =>'{attribute} bo\'sh bo\'lishi mumkin emas'],
            [['image'], 'file', 'extensions' => 'png, jpeg, jpg', 'maxSize' => 2*(1024*1024)],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesson_name' => 'Dars Nomi',
            'link' => 'Link',
            'status' => 'Holati',
        ];
    }

    public function uploadImg($oldImage = null, $oldFile = null)
    {
        $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image)) {
            $this->image->saveAs('@frontend/web/krossword/' .'img_'.time() . '.' . $this->image->extension);
            $this->image = 'img_'.time().'.'.$this->image->extension;
        }else{
            $this->image = $oldImage;
        }
    }
}

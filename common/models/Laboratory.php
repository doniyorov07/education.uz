<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\UploadForm;
use Yii;

/**
 * This is the model class for table "laboratory".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $date
 * @property string|null $title
 * @property string|null $file
 * @property int|null $status
 */
class Laboratory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['image', 'date', 'file'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 500],
            [['image'], 'file', 'extensions' => 'png, jpg, JPG, webp', 'maxSize' => 1*(1024*1024)],
            [['file'], 'file', 'extensions' => 'pdf', 'maxSize' => 10*(1024*1024)],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Foto',
            'date' => 'Vaqt',
            'title' => 'Text',
            'file' => 'Fayl',
            'status' => 'Holati',
        ];
    }


     public function uploadImg($oldImage = null, $oldFile = null)
    {   

        $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image)) {
        $this->image->saveAs('@frontend/web/laboratory/image/' . $this->image->baseName . '.' . $this->image->extension);
        $this->image = $this->image->baseName.'.'.$this->image->extension;
        }else{

            $this->image = $oldImage;
        }
       
        $this->file = UploadedFile::getInstance($this, 'file');
        if (isset($this->file)) {
        $this->file->saveAs('@frontend/web/laboratory/file/' . $this->file->baseName . '.' . $this->file->extension);
        $this->file = $this->file->baseName.'.'.$this->file->extension;
        }else{
            $this->file = $oldFile;
        }
       

    }
}

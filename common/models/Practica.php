<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\UploadForm;
use Yii;

/**
 * This is the model class for table "practica".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $title
 * @property string|null $file
 * @property int|null $status
 * @property int|null $type_id
 * @property string|null $video_url

 */
class Practica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'practica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'type_id'], 'integer'],
            [['image', 'title', 'file', 'date', 'video_url'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'file' => 'Fayl',
            'date' => "Vaqt",
            'status' => 'Holati',
            'type_id' => 'Tegishlilik',
            'video_url' => 'Video Manzili',
        ];
    }


     public function uploadImg($oldImage = null, $oldFile = null)
    {   

        $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image)) {
        $this->image->saveAs('@frontend/web/practica/image/' . $this->image->baseName . '.' . $this->image->extension);
        $this->image = $this->image->baseName.'.'.$this->image->extension;
        }else{

            $this->image = $oldImage;
        }
       
        $this->file = UploadedFile::getInstance($this, 'file');
        if (isset($this->file)) {
        $this->file->saveAs('@frontend/web/practica/file/' . $this->file->baseName . '.' . $this->file->extension);
        $this->file = $this->file->baseName.'.'.$this->file->extension;
        }else{
            $this->file = $oldFile;
        }
       

    }
}

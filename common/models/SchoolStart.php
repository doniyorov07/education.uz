<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\UploadForm;

use Yii;

/**
 * This is the model class for table "school_start".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $title
 * @property string|null $text
 * @property int|null $status
 */
class SchoolStart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school_start';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['image', 'title', 'text'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg, JPG, webp'],
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
            'text' => 'Text',
            'status' => 'Holati',
        ];
    }

     public function uploadImg($oldImage = null)
    {
        
         $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image)) {
             $this->image->saveAs('@frontend/web/school/' . $this->image->baseName . '.' . $this->image->extension);
        $this->image = $this->image->baseName.'.'.$this->image->extension;
        }else{
         $this->image = $oldImage;            
        }
       
    }
}

<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\UploadForm;
use Yii;

/**
 * This is the model class for table "theory".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $date
 * @property string|null $title
 * @property string|null $text
 * @property string|null $file
 * @property int|null $status
 * @property string|null $video_url
 * @property int|null $type_id
 */
class Theory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['status', 'type_id'], 'integer'],
            [['image', 'title', 'text', 'file', 'video_url'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg, JPG, webp', 'maxSize' => 1*(1024*1024)],
            [['file'], 'file', 'extensions' => 'pdf, html', 'maxSize' => 10*(1024*1024)],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Kategoriya',
            'image' => 'Foto',
            'date' => 'Vaqt',
            'title' => 'Title',
            'text' => 'Text',
            'file' => 'Fayl',
            'video_url' => 'Video manzili',
            'status' => 'Holati',
        ];
    }


    public function uploadImg($oldImage = null, $oldFile = null)
    {   

        $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image)) {
        $this->image->saveAs('@frontend/web/theory/image/' .'img_'.time() . '.' . $this->image->extension);
        $this->image = 'img_'.time().'.'.$this->image->extension;
        if(file_exists(Yii::getAlias('@frontend/web/theory/image/').$oldImage)){
            unlink(Yii::getAlias('@frontend/web/theory/image/').$oldImage);
        }
        }else{
            
            $this->image = $oldImage;
        }
      
        $this->file = UploadedFile::getInstance($this, 'file');
      
        if (isset($this->file)) {
      
        $this->file->saveAs('@frontend/web/theory/file/' . 'file_'.time() . '.' . $this->file->extension);
      
        $this->file = 'file_'.time().'.'.$this->file->extension;
      
        if(file_exists(Yii::getAlias('@frontend/web/theory/file/').$oldFile)){
            
            unlink(Yii::getAlias('@frontend/web/theory/file/').$oldFile);
            }
        }
        else{
            $this->file = $oldFile;
        }
       

    }

}

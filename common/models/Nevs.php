<?php

namespace common\models;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\UploadForm;

use Yii;

/**
 * This is the model class for table "nevs".
 *
 * @property int $id
 * @property string|null $views_count
 * @property string|null $image
 * @property string|null $video_url
 * @property string|null $title
 * @property string|null $text
 * @property string|null $batafsil
 * @property string|null $date
 * @property int|null $status
 */
class Nevs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nevs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['batafsil'], 'string'],
            [['date'], 'safe'],
            [['status'], 'integer'],
            [['views_count', 'image', 'video_url', 'title', 'text', 'type_id'], 'string', 'max' => 255],
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
            'type_id' => 'Kategoriya',
            'views_count' => 'Ko\'rishlar soni',
            'image' => 'Rasm',
            'video_url' => 'Video manzili',
            'title' => 'Title',
            'text' => 'Text',
            'batafsil' => 'Batafsil',
            'date' => 'Vaqt',
            'status' => 'Holati',
        ];
    }

      public function uploadImg($oldImage = null)
    {
         $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image)) {
             $this->image->saveAs('@frontend/web/news/' . $this->image->baseName . '.' . $this->image->extension);
        $this->image = $this->image->baseName.'.'.$this->image->extension;
        }else{
         $this->image = $oldImage;            
        }
       
    }
}

<?php

namespace common\models;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\UploadForm;
use Yii;


/**
 * This is the model class for table "Slider".
 *
 * @property int $id
 * @property string|null $foto1
 * @property string|null $foto2
 * @property string|null $title1
 * @property string|null $title2
 * @property string|null $text1
 * @property string|null $text2
 * @property int|null $status
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['foto1', 'foto2', 'title1', 'title2', 'text1', 'text2'], 'string', 'max' => 255],
            [['foto1'], 'file', 'extensions' => 'png, jpg, JPG, webp', 'maxSize' => 1*(1024*1024)],
            [['foto2'], 'file', 'extensions' => 'png, jpg, JPG, webp', 'maxSize' => 1*(1024*1024)],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'foto1' => 'Foto 1',
            'foto2' => 'Foto 2',
            'title1' => 'Title 1',
            'title2' => 'Title 2',
            'text1' => 'Text 1',
            'text2' => 'Text 2',
            'status' => 'Holat',
        ];
    }


    public function uploadImg($oldImage1 = null, $oldImage2 = null)
    {   

        $this->foto1 = UploadedFile::getInstance($this, 'foto1');
        if (isset($this->foto1)) {
        $this->foto1->saveAs('@frontend/web/slider/foto1/' . $this->foto1->baseName . '.' . $this->foto1->extension);
        $this->foto1 = $this->foto1->baseName.'.'.$this->foto1->extension;
        }else{

            $this->foto1 = $oldImage1;
        }
       
        $this->foto2 = UploadedFile::getInstance($this, 'foto2');
        if (isset($this->foto2)) {
        $this->foto2->saveAs('@frontend/web/slider/foto2/' . $this->foto2->baseName . '.' . $this->foto2->extension);
        $this->foto2 = $this->foto2->baseName.'.'.$this->foto2->extension;
        }else{
            $this->foto2 = $oldImage2;
        }
       

    }
}

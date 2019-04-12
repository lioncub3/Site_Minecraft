<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "carousel_data".
 *
 * @property int $id
 * @property string $img_banner
 * @property string $title
 * @property string $content
 */
class CarouselData extends \yii\db\ActiveRecord
{

    public $image;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carousel_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string'],
            [['img_banner'], 'string', 'max' => 50],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions' => 'jpg, gif, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img_banner' => 'Картинка',
            'title' => 'Заголовок',
            'content' => 'Текст',
            'image' => 'Картинка',
        ];
    }

    public function beforeSave($insert)
    {
        $this->image = UploadedFile::getInstance($this, 'image');

        $path = Yii::$app->basePath . '/web/images/';

        if(!file_exists($path))
            mkdir($path, 0777, true);

        if ($this->image)
        {
            if ($this->img_banner != null)
            {
                $path_delete_file = $path . $this->img_banner;
                FileHelper::unlink($path_delete_file);
            }

            $new_name = rand(100000, 90000000) . '.' . $this->image->extension;
            $this->img_banner = '/images/' . $new_name;
//            $path_save = Yii::$app->params['uploadPath'] . $this->image;
            $this->image->saveAs($path . $new_name);
        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function beforeDelete()
    {


        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}

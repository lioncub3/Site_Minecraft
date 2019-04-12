<?php

namespace app\models;

use Yii;

class Gallery extends \yii\db\ActiveRecord
{
    const CATEGORY_INTERIOR_DESIGN = 2;
    const CATEGORY_ART_GALLERY = 3;
    const CATEGORY_FURNITURE = 4;

    public $image;

    public function rules()
    {
        return [
            [['id'], 'number', 'max' => 11],                        
            [['url_image'], 'string', 'max' => 200],            
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 300],
            [[ 'name', 'id_services', 'description'], 'safe'],
            [[ 'name', 'id_services'], 'required'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'url_image' => 'Адреса',
            'name' => 'Название',
            'description' => 'Описание',
            'image' => 'Изображение'
        ];
    }
}
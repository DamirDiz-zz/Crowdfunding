<?php

namespace app\models;

use Yii;
use app\assets\AppAsset;
/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $title
 * @property string $shortDescription
 * @property string $location
 * @property double $longitude
 * @property double $latitude
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $mainImage
 * @property integer $category_id
 *
 * @property Category $category
 */
class Project extends \yii\db\ActiveRecord
{
    
    public $mainImageFile;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'shortDescription', 'location', 'created_at', 'updated_at'], 'required'],
            [['shortDescription'], 'string'],
            [['longitude', 'latitude'], 'number'],
            [['created_at', 'updated_at', 'category_id'], 'integer'],
            [['title', 'location', 'mainImage'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'shortDescription' => 'Short Description',
            'location' => 'Location',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'mainImage' => 'Main Image',
            'category_id' => 'Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getImagePath() 
    {
        return  'uploads/' . $this->mainImage;
    }

}

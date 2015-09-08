<?php

namespace app\models;

use Yii;

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
 */
class Project extends \yii\db\ActiveRecord
{
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
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'location'], 'string', 'max' => 255],
            [['mainImage'], 'file', 'extensions' => 'png, jpg'],
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
        ];
    }
}

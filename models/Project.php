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
 * @property string $formattedAddress
 * @property double $longitude
 * @property double $latitude
 * 
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
            [['shortDescription', 'created_at', 'updated_at', 'category_id', 'placeId'], 'required'],
            [['title'], 'required', 'message' => 'Bitte gib deinem Projekt einen Namen.'],
            [['shortDescription'], 'string', 'min' => 150, 'message' => 'Erzähle uns bitte ein bisschen mehr über deine Idee.'],
            [['longitude', 'latitude'], 'number'],
            [['location'], 'required', 'message' => 'Wir brauchen einen Ort um den Leuten zeigen zu können wo sich dein Projekt befindet.'],
            [['created_at', 'updated_at', 'category_id'], 'integer'],
            [['title', 'location', 'formattedAddress', 'mainImage'], 'string', 'max' => 255]
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
            'formattedAddress' => 'Volle Addresse',
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser2projects()
    {
        return $this->hasMany(User2project::className(), ['project_id' => 'id']);
    }

    public function getInitiator() {
        $user2project = User2project::findOne(['project_id' => $this->id, 'role_id' => 1]);
        if($user2project) {
            return User::findOne($user2project->user_id);
        }
        
        return null;
    }
    
    public function getImagePath() 
    {
        return  'uploads/' . $this->mainImage;
    }

}

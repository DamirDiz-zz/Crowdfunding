<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projectDescription".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $value
 * @property string $description
 * @property integer $type
 * @property integer $position
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Project $project
 */
class ProjectDescription extends \yii\db\ActiveRecord
{
    const TEXT = 0;
    const IMAGE = 1;
    const URL = 2;

    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projectDescription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'value', 'type', 'position', 'created_at', 'updated_at'], 'required'],
            [['project_id', 'type', 'position', 'created_at', 'updated_at'], 'integer'],
            [['value', 'description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'value' => 'Value',
            'description' => 'Description',
            'type' => 'Type',
            'position' => 'Position',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
    
    public function getImagePath() 
    {
        return  Yii::getAlias('@web') . '/uploads/' . $this->value;
    }

}

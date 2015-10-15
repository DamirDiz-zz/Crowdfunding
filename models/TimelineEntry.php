<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timelineEntry".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $title
 * @property string $text
 * @property integer $userReference
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $type_id
 *
 * @property Project $project
 * @property User $userReference0
 * @property TimelineEntryType $type
 */
class TimelineEntry extends \yii\db\ActiveRecord
{
    const ACHIEVMENT = 1;
    const INFO = 2;
    const USER = 3;
    const START = 4;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timelineEntry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'title', 'created_at', 'updated_at'], 'required'],
            [['project_id', 'userReference', 'created_at', 'updated_at', 'type_id'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255]
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
            'title' => 'Title',
            'text' => 'Text',
            'userReference' => 'User Reference',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'type_id' => 'Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserReference0()
    {
        return $this->hasOne(User::className(), ['id' => 'userReference']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TimelineEntryType::className(), ['id' => 'type_id']);
    }
}

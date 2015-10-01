<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "todo".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $content
 * @property integer $status
 * @property integer $creator
 * @property integer $assignedTo
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $creator0
 * @property Project $project
 */
class Todo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'content', 'status', 'creator', 'created_at', 'updated_at'], 'required'],
            [['project_id', 'status', 'creator', 'assignedTo', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string']
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
            'content' => 'Content',
            'status' => 'Status',
            'creator' => 'Creator',
            'assignedTo' => 'Assigned To',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator0()
    {
        return $this->hasOne(User::className(), ['id' => 'creator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}

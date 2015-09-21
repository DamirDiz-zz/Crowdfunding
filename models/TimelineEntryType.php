<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timelineEntryType".
 *
 * @property integer $id
 * @property string $type
 *
 * @property TimelineEntry[] $timelineEntries
 */
class TimelineEntryType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timelineEntryType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimelineEntries()
    {
        return $this->hasMany(TimelineEntry::className(), ['type_id' => 'id']);
    }
}

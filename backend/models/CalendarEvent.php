<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calendar_event".
 *
 * @property integer $id
 * @property string $title
 * @property string $startDate
 * @property string $endDate
 * @property string $startTime
 * @property string $endTime
 * @property string $isDeleted
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 */
class CalendarEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['title', 'startDate', 'endDate', 'startTime', 'endTime'], 'required'],
        [['isDeleted','startDate', 'endDate', 'startTime', 'endTime', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
        [['created_by', 'updated_by', 'deleted_by'], 'integer'],
        [['title'], 'string', 'max' => 250],
        [['isDeleted'], 'string', 'max' => 1],
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
        'startDate' => 'Start Date',
        'endDate' => 'End Date',
        'startTime' => 'Start Time',
        'endTime' => 'End Time',
        'isDeleted' => 'Is Deleted',
        'created_at' => 'Created At',
        'created_by' => 'Created By',
        'updated_at' => 'Updated At',
        'updated_by' => 'Updated By',
        'deleted_at' => 'Deleted At',
        'deleted_by' => 'Deleted By',
        ];
    }

    public static function getRandColor() {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}

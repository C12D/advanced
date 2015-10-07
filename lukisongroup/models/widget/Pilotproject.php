<?php

namespace lukisongroup\models\widget;

use Yii;

/**
 * This is the model class for table "sc0001".
 *
 * @property string $ID
 * @property string $PARENT
 * @property string $DISC
 * @property string $PLAN_DATE1
 * @property string $PLAN_DATE2
 * @property string $PLAN_TIME1
 * @property string $PLAN_TIME2
 * @property string $ACTUAL_DATE1
 * @property string $ACTUAL_DATE2
 * @property string $ACTUAL_TIME1
 * @property string $ACTUAL_TIME2
 * @property integer $STATUS
 * @property string $CORP_ID
 * @property string $DEP_ID
 * @property string $USER_CREATED
 */
class Pilotproject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sc0001';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_widget');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PARENT','PILOT_ID', 'STATUS', 'USER_CREATED'], 'integer'],
            [['PLAN_DATE1','PLAN_DATE2','ACTUAL_DATE1', 'ACTUAL_DATE2'], 'safe'],
            [['PILOT_NM'], 'string', 'max' => 255],
			[['DSCRP'], 'string'],
            [['CORP_ID', 'DEP_ID'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'PARENT' => 'Parent',
			'PILOT_ID' => 'PILOT ID',
            'PILOT_NM' => 'SCHEDULE NAME',
			'DSCRP' => 'Description',
            'PLAN_DATE1' => 'Start Planned',
            'PLAN_DATE2' => 'End Planned',            
            'ACTUAL_DATE1' => 'Actual opening',
            'ACTUAL_DATE2' => 'Actual closing',
            'STATUS' => 'Status',
            'CORP_ID' => 'Corp  ID',
            'DEP_ID' => 'Dep  ID',
            'USER_CREATED' => 'User  Created',
        ];
    }
}

<?php
namespace api\modules\chart\models;
use Yii;
/*DELAY TASK*/
class Pilotdelay extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'sc0001';
    }
  
    public static function getDb()
    {
        return Yii::$app->get('db_widget');
    }

    public function rules()
    {
        return [
            [['PARENT','PILOT_ID', 'STATUS','SORT','BOBOT'], 'integer'],
            [['PLAN_DATE1','PLAN_DATE2','ACTUAL_DATE1', 'ACTUAL_DATE2','UPDATED_TIME'], 'safe'],
            [['PILOT_NM','label'], 'string', 'max' => 255],
			[['DSCRP'], 'string'],
            [['CORP_ID', 'DEP_ID'], 'string', 'max' => 6],
			[['DESTINATION_TO','CREATED_BY','UPDATED_BY'], 'string', 'max' => 50]			
        ];
    }
	public function fields()
	{
		return [
			'label'=>function($model){
							return $model->PILOT_NM;
					},			
			'id'=>function($model){
							return $model->ID;
					},
			'plan_date1'=>function($model){
							return Yii::$app->ambilKonvesi->convert($model->PLAN_DATE1,'date');
					},			
			'plan_date2'=>function($model){
							return Yii::$app->ambilKonvesi->convert($model->PLAN_DATE2,'date');
					},	
			'actual_date1'=>function($model){
							return Yii::$app->ambilKonvesi->convert($model->ACTUAL_DATE1,'date');
					},			
			'actual_date2'=>function($model){
							return Yii::$app->ambilKonvesi->convert($model->ACTUAL_DATE2,'date');
					},
			'status'=>function($model){
							return $model->STATUS;
					},
		];
	}
	public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'PARENT' => 'Parent',
			'SORT'=>'Sort',
			'PILOT_ID' => 'Pilot.ID',
            'PILOT_NM' => 'Schedule.Nm',
			'DSCRP' => 'Description',
            'PLAN_DATE1' => 'Start.Planned',
            'PLAN_DATE2' => 'End.Planned',            
            'ACTUAL_DATE1' => 'Actual.Opening',
            'ACTUAL_DATE2' => 'Actual.Closing',
			'DESTINATION_TO'=>'Send-To',
			'BOBOT'=>'Lavel',
            'CORP_ID' => 'Corp.ID',
            'DEP_ID' => 'Dept.ID',
            'CREATED_BY'=> 'Created',
			'UPDATED_BY'=> 'Updated',
			'UPDATED_TIME'=> 'DateTime',
			'STATUS' => 'Status',
        ];
    }
}

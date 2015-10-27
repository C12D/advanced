<?php
namespace api\modules\chart\models;
use Yii;
/*ACTUAL TASK*/
class Pilotactual extends \yii\db\ActiveRecord
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
							return 'Actual';
					},			
			'processid'=>function($model){
							return $model->ID;
					},
			'start'=>function($model){
							if ($model->ACTUAL_DATE1<>'' AND $model->ACTUAL_DATE2<>''){
								return Yii::$app->ambilKonvesi->convert($model->ACTUAL_DATE1,'date');
							}else{
								return '';
							}
					},			
			'end'=>function($model){
				if ($model->ACTUAL_DATE1<>'' AND $model->ACTUAL_DATE2<>''){
								return Yii::$app->ambilKonvesi->convert($model->ACTUAL_DATE2,'date');
							}else{
								return '';
							}							
					},
			'color'=>function($model){
							return '#6baa01';
					},
            'height'=>function($model){
							return '32%';
					}, 
            'toppadding'=>function($model){
							return '56%';
					}
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

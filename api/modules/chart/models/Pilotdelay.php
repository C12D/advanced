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
							return 'Delay';
					},			
			'processid'=>function($model){
							return "" .$model->ID .""; //Harus String atau tanda ""
					},
			'start'=>function($model){
							if ($model->PLAN_DATE2<>'' AND $model->ACTUAL_DATE1<>''){
								return Yii::$app->ambilKonvesi->convert($model->PLAN_DATE2,'date');
							}else{
								return '';
							}
					},			
			'end'=>function($model){
						if (($model->STATUS)==1){ /*CLOSING*/
							if ($model->PLAN_DATE1<>'' AND $model->PLAN_DATE2<>''AND $model->ACTUAL_DATE1<>''AND $model->ACTUAL_DATE2<>''){
								return Yii::$app->ambilKonvesi->convert($model->ACTUAL_DATE2,'date');
							}else{
								return '';
							}
						}elseif (($model->STATUS)==0){ /* DELAY RUNNING*/
							if ($model->ACTUAL_DATE1<>''){
								if ((Yii::$app->ambilKonvesi->convert(date('d-m-Y'),'date'))>(Yii::$app->ambilKonvesi->convert($model->PLAN_DATE2,'date'))){
									return Yii::$app->ambilKonvesi->convert(date('d-m-Y'),'date');		/*PENAMBAHAN HARI*/						
								}else{
									return '';//Yii::$app->ambilKonvesi->convert(date('d-m-Y'),'date'); /*CLOSE PLAN PROGRESS -> DELAY*/
								}							
							}else{
								return ''; 
							}								
						}
					},
			'id'=>function($model){
							return $model->ID.'-2'; //Harus String atau tanda ""
					},
			'color'=>function($model){
							return '#e44a00';
					},
            'height'=>function($model){
							return '32%';
					}, 
            'toppadding'=>function($model){
							return '56%';
					},
			'tooltext'=>function($model){
							if($model->ACTUAL_DATE2<>'' AND $model->PLAN_DATE2<>''){
								/*Delay message show if dalay run*/
								return  'Delayed by '.Yii::$app->ambilKonvesi->Tgldiff($model->ACTUAL_DATE2,$model->PLAN_DATE2,'d').' days';	
								//return 'tgl skarang ' .Yii::$app->ambilKonvesi->tglSekarang();
							}							
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

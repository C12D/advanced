<?php
/**
 *Pilotproject
 *@link https://github.com/C12D/advanced/blob/master/api/modules/chart/models/Pilotproject.php
 *@copyright Copyright (c) 2005/2016 lukisongroup
 *@since 1.1
*/

namespace api\modules\chart\models;
use Yii;

/**
 * Model Pilotproject Class  Author: -ptr.nov-
 */
class Pilotproject extends \yii\db\ActiveRecord
{
	/**
	  * Nama database yang di tuju 
	 */
	public static function getDb()
    {
        return Yii::$app->get('db_widget');
    }
	
	/**
	  * Nama Table yang di tuju 
	 */
    public static function tableName()
    {
        return 'sc0001';
    }  

    public function rules()
    {
        return [
            [['PARENT','PILOT_ID', 'STATUS','SORT','BOBOT'], 'integer'],
            [['PLAN_DATE1','PLAN_DATE2','ACTUAL_DATE1', 'ACTUAL_DATE2','UPDATED_TIME'], 'safe'],
            [['PILOT_NM'], 'string', 'max' => 255],
			[['DSCRP'], 'string'],
            [['CORP_ID', 'DEP_ID'], 'string', 'max' => 6],
			[['DESTINATION_TO','CREATED_BY','UPDATED_BY'], 'string', 'max' => 50]			
        ];
    }
	
	/**
	  * Nama Fields Alias yang mengunakan nilai tertentu 
	 */
	public function fields()
	{
		return [
			/**
			  * Field Alias label dari Filed value PILOT_NM
			 */
			'label'=>function($model){
							return $model->PILOT_NM;
					},
			/**
			  * ID harus String dengan tanda ""
			 */	
			'id'=>function($model){
							return "" .$model->ID ."";  // Harys String atau dengan tanda ""
					},	
			/**
			  * Alias Filed hoverBandColor static untuk nilai warna #e44a00
			 */	
			'hoverBandColor'=>function($model){
							return '#e44a00';
					},
			/**
			  * Alias Filed hoverBandAlpha static untuk ukuran 40
			 */		
            'hoverBandAlpha'=>function($model){
							return '40';
					},
			/**
			  * Alias Filed height static untuk nilai task
			 */
			'height'=>function($model){
							return '40';
					}, 
		];
	}
	
	/**
	  * setting label unruk Atribute Fields 
	 */
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

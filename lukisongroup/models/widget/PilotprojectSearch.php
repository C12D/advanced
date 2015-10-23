<?php

namespace lukisongroup\models\widget;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lukisongroup\models\widget\Pilotproject;

class PilotprojectSearch extends Pilotproject
{
    
    public function rules()
    {
        return [
            [['ID', 'PARENT','PILOT_ID','STATUS','SORT','BOBOT'], 'integer'],
            [['PILOT_NM','PLAN_DATE1', 'PLAN_DATE2','ACTUAL_DATE1', 'ACTUAL_DATE2', 'CORP_ID', 'DEP_ID'], 'safe'],
			[['DESTINATION_TO'], 'string', 'max' => 50]
        ];
    }

    
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    
    public function search($params)
    {
        $query = Pilotproject::find()->Where('sc0001.STATUS<>3');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'PARENT' => $this->PARENT,
			'SORT' => $this->SORT,
			'PILOT_ID' => $this->PILOT_ID,
			'PILOT_NM' => $this->PILOT_NM,
			'DSCRP' => $this->DSCRP,			
            'PLAN_DATE1' => $this->PLAN_DATE1,
            'PLAN_DATE2' => $this->PLAN_DATE2,
            'ACTUAL_DATE1' => $this->ACTUAL_DATE1,
            'ACTUAL_DATE2' => $this->ACTUAL_DATE2,
			'DESTINATION_TO'=>$this->DESTINATION_TO,
			'BOBOT'=>$this->BOBOT,
            'STATUS' => $this->STATUS,				
        ]);

        $query->andFilterWhere(['like', 'PILOT_NM', $this->PILOT_NM])
            ->andFilterWhere(['like', 'CORP_ID', $this->CORP_ID])
            ->andFilterWhere(['like', 'DEP_ID', $this->DEP_ID]);
		
		$query->orderby(['SORT'=>SORT_ASC]); //SORT PENTING UNTUK RECURSIVE BIAR TREE BISA URUTAN, save => (IF (PATENT =0) {SORT=ID}, ELSE {SORT=PATENT}, note Parent=ID header
			
        return $dataProvider;
    }
}

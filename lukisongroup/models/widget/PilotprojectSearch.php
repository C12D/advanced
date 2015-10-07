<?php

namespace lukisongroup\models\widget;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lukisongroup\models\widget\Pilotproject;

/**
 * PilotprojectSearch represents the model behind the search form about `lukisongroup\models\widget\Pilotproject`.
 */
class PilotprojectSearch extends Pilotproject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'PARENT','PILOT_ID','STATUS', 'USER_CREATED'], 'integer'],
            [['PILOT_NM','DSCRP', 'PLAN_DATE1', 'PLAN_DATE2','ACTUAL_DATE1', 'ACTUAL_DATE2', 'CORP_ID', 'DEP_ID'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pilotproject::find();

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
			'PILOT_ID' => $this->PILOT_ID,
			'PILOT_NM' => $this->PILOT_NM,
			'DSCRP' => $this->DSCRP,			
            'PLAN_DATE1' => $this->PLAN_DATE1,
            'PLAN_DATE2' => $this->PLAN_DATE2,
            'ACTUAL_DATE1' => $this->ACTUAL_DATE1,
            'ACTUAL_DATE2' => $this->ACTUAL_DATE2,
            'STATUS' => $this->STATUS,
            'USER_CREATED' => $this->USER_CREATED,
        ]);

        $query->andFilterWhere(['like', 'PILOT_NM', $this->PILOT_NM])
            ->andFilterWhere(['like', 'CORP_ID', $this->CORP_ID])
            ->andFilterWhere(['like', 'DEP_ID', $this->DEP_ID]);

        return $dataProvider;
    }
}

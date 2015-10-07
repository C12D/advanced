<?php

namespace lukisongroup\models\hrd;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lukisongroup\models\hrd\Jobgrademodul;

/**
 * JobgrademodulSearch represents the model behind the search form about `lukisongroup\models\hrd\Jobgrademodul`.
 */
class JobgrademodulSearch extends Jobgrademodul
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'GF_ID', 'SEQ_ID', 'SORT', 'JOBGRADE_STS'], 'integer'],
            [['JOBGRADE_ID', 'JOBGRADE_NM', 'JOBGRADE_DCRP'], 'safe'],
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
        $query = Jobgrademodul::find();

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
            'GF_ID' => $this->GF_ID,
            'SEQ_ID' => $this->SEQ_ID,
            'SORT' => $this->SORT,
            'JOBGRADE_STS' => $this->JOBGRADE_STS,
        ]);

        $query->andFilterWhere(['like', 'JOBGRADE_ID', $this->JOBGRADE_ID])
            ->andFilterWhere(['like', 'JOBGRADE_NM', $this->JOBGRADE_NM])
            ->andFilterWhere(['like', 'JOBGRADE_DCRP', $this->JOBGRADE_DCRP]);

        return $dataProvider;
    }
}

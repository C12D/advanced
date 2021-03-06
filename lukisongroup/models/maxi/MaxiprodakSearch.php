<?php

namespace app\models\maxi;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\maxi\Maxiprodak;

/**
 * MaxiprodakSearch represents the model behind the search form about `app\models\maxi\Maxiprodak`.
 */
class MaxiprodakSearch extends Maxiprodak
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BRG_ID', 'BRG_NM'], 'safe'],
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
        $query = Maxiprodak::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'BRG_ID', $this->BRG_ID])
            ->andFilterWhere(['like', 'BRG_NM', $this->BRG_NM]);

        return $dataProvider;
    }
}

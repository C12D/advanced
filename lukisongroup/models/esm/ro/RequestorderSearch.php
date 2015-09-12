<?php

namespace lukisongroup\models\esm\ro;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lukisongroup\models\esm\ro\Requestorder;

use lukisongroup\models\hrd\Employe;
/**
 * RequestorderSearch represents the model behind the search form about `app\models\esm\ro\Requestorder`.
 */
class RequestorderSearch extends Requestorder
{
	
	public $nmemp;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'STATUS'], 'integer'],
            [['KD_RO', 'NOTE', 'ID_USER', 'KD_CORP', 'KD_CAB', 'KD_DEP', 'CREATED_AT', 'UPDATED_ALL', 'DATA_ALL'], 'safe'],
            [['nmemp'], 'safe'],
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
		$empId = Yii::$app->user->identity->EMP_ID;
		$dt = Employe::find()->where(['EMP_ID'=>$empId])->all();
		$crp = $dt[0]['EMP_CORP_ID'];
		
		if($dt[0]['JAB_ID'] == 'MGR'){
			$query = Requestorder::find()->where("r0001.status <> 3 and r0001.KD_CORP = '$crp' ");
		} else {
			$query = Requestorder::find()->where("r0001.status <> 3 and r0001.KD_CORP = '$crp' and r0001.ID_USER = '$empId' ");
		}
		
		$query->joinWith(['employe' => function ($q) {
			$q->where('a0001.EMP_NM LIKE "%' . $this->nmemp . '%"');
		}]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

		 $dataProvider->setSort([
			'attributes' => [
			'KD_RO',
			'KD_CORP',
			
			'nmemp' => [
				'asc' => ['a0001.EMP_NM' => SORT_ASC],
				'desc' => ['a0001.EMP_NM' => SORT_DESC],
				'label' => 'Pembuat',
			],			
			]
		]);
		
		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}
		
        $query->andFilterWhere(['like', 'a0001.EMP_NM', $this->EMP_NM])
		->andFilterWhere(['like', 'KD_RO', $this->KD_RO])
		->andFilterWhere(['like', 'KD_CORP', $this->KD_CORP]);
        return $dataProvider;
		
		/*
        $query->andFilterWhere([
		'ID' => $this->ID,
		'STATUS' => $this->STATUS,
		'CREATED_AT' => $this->CREATED_AT,
        ]);

        $query->andFilterWhere(['like', 'KD_RO', $this->KD_RO])
            ->andFilterWhere(['like', 'NOTE', $this->NOTE])
            ->andFilterWhere(['like', 'ID_USER', $this->ID_USER])
            ->andFilterWhere(['like', 'KD_CORP', $this->KD_CORP])
            ->andFilterWhere(['like', 'KD_CAB', $this->KD_CAB])
            ->andFilterWhere(['like', 'KD_DEP', $this->KD_DEP])
            ->andFilterWhere(['like', 'UPDATED_ALL', $this->UPDATED_ALL])
            ->andFilterWhere(['like', 'DATA_ALL', $this->DATA_ALL]);

        return $dataProvider;
		*/
    }
}

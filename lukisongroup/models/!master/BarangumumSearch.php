<?php

namespace app\models\master;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\master\Barangumum;

/**
 * BarangumumSearch represents the model behind the search form about `app\models\master\Barangumum`.
 */
class BarangumumSearch extends Barangumum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'STATUS'], 'integer'],
            [['KD_BARANG', 'NM_BARANG', 'KD_TYPE', 'KD_KATEGORI', 'KD_UNIT', 'KD_SUPPLIER', 'KD_DISTRIBUTOR', 'PARENT', 'BARCODE', 'IMAGE', 'NOTE', 'KD_CORP', 'KD_CAB', 'KD_DEP', 'CREATED_BY', 'CREATED_AT', 'UPDATED_BY', 'UPDATED_AT', 'DATA_ALL'], 'safe'],
            [['HPP', 'HARGA'], 'number'],
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
        $query = Barangumum::find();

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
            'HPP' => $this->HPP,
            'HARGA' => $this->HARGA,
            'STATUS' => $this->STATUS,
            'CREATED_AT' => $this->CREATED_AT,
            'UPDATED_AT' => $this->UPDATED_AT,
        ]);

        $query->andFilterWhere(['like', 'KD_BARANG', $this->KD_BARANG])
            ->andFilterWhere(['like', 'NM_BARANG', $this->NM_BARANG])
            ->andFilterWhere(['like', 'KD_TYPE', $this->KD_TYPE])
            ->andFilterWhere(['like', 'KD_KATEGORI', $this->KD_TYPE])
            ->andFilterWhere(['like', 'KD_UNIT', $this->KD_UNIT])
            ->andFilterWhere(['like', 'KD_SUPPLIER', $this->KD_SUPPLIER])
            ->andFilterWhere(['like', 'KD_DISTRIBUTOR', $this->KD_DISTRIBUTOR])
            ->andFilterWhere(['like', 'PARENT', $this->PARENT])
            ->andFilterWhere(['like', 'BARCODE', $this->BARCODE])
            ->andFilterWhere(['like', 'IMAGE', $this->IMAGE])
            ->andFilterWhere(['like', 'NOTE', $this->NOTE])
            ->andFilterWhere(['like', 'KD_CORP', $this->KD_CORP])
            ->andFilterWhere(['like', 'KD_CAB', $this->KD_CAB])
            ->andFilterWhere(['like', 'KD_DEP', $this->KD_DEP])
            ->andFilterWhere(['like', 'CREATED_BY', $this->CREATED_BY])
            ->andFilterWhere(['like', 'UPDATED_BY', $this->UPDATED_BY])
            ->andFilterWhere(['like', 'DATA_ALL', $this->DATA_ALL]);

        return $dataProvider;
    }
}

<?php

namespace lukisongroup\models\system\erpmodul;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lukisongroup\models\system\erpmodul\Mdlpermission;

/**
 * MdlpermissionSearch represents the model behind the search form about `lukisongroup\models\system\erpmodul\Mdlpermission`.
 */
class MdlpermissionSearch extends Mdlpermission
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'USER_ID', 'MODUL_ID', 'STATUS'], 'integer'],// 'CREATE', 'EDIT', 'TOMBOL1', 'TOMBOL2', 'TOMBOL3', 'TOMBOL4', 'TOMBOL5', 'TOMBOL6', 'TOMBOL7', 'TOMBOL8', 'TOMBOL9', 'TOMBOL10'], 'integer'],
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
        $query = Mdlpermission::find();

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
            'USER_ID' => $this->USER_ID,
            'MODUL_ID' => $this->MODUL_ID,
            'STATUS' => $this->STATUS,
            'CREATE' => $this->CREATE,
            'EDIT' => $this->EDIT,
            'TOMBOL1' => $this->TOMBOL1,
            'TOMBOL2' => $this->TOMBOL2,
            'TOMBOL3' => $this->TOMBOL3,
            'TOMBOL4' => $this->TOMBOL4,
            'TOMBOL5' => $this->TOMBOL5,
            'TOMBOL6' => $this->TOMBOL6,
            'TOMBOL7' => $this->TOMBOL7,
            'TOMBOL8' => $this->TOMBOL8,
            'TOMBOL9' => $this->TOMBOL9,
            'TOMBOL10' => $this->TOMBOL10,
        ]);

        return $dataProvider;
    }
}

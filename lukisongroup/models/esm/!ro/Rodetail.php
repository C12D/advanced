<?php

namespace app\models\esm\ro;

use Yii;

/**
 * This is the model class for table "r0003".
 *
 * @property string $ID
 * @property string $KD_RO
 * @property string $KD_BARANG
 * @property string $NM_BARANG
 * @property integer $QTY
 * @property string $NO_URUT
 * @property string $NOTE
 * @property integer $STATUS
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 */
class Rodetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'r0003';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_esm');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
 //           [['ID','KD_RO', 'KD_BARANG', 'NM_BARANG', 'QTY', 'NO_URUT', 'NOTE', 'STATUS', 'CREATED_AT', 'UPDATED_AT'], 'required'],
  //          [['KD_RO', 'NM_BARANG', 'QTY'], 'required'],
            [['QTY', 'STATUS'], 'integer'],
            [['NOTE'], 'string'],
            [['CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['KD_RO', 'KD_BARANG'], 'string', 'max' => 50],
            [['NM_BARANG', 'NO_URUT'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'KD_RO' => 'Kd  Ro',
            'KD_BARANG' => 'Kd  Barang',
            'NM_BARANG' => 'Nm  Barang',
            'QTY' => 'Qty',
            'NO_URUT' => 'No  Urut',
            'NOTE' => 'Note',
            'STATUS' => 'Status',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
        ];
    }
}

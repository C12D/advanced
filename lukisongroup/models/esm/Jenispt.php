<?php

namespace lukisongroup\models\esm;

use Yii;

/**
 * This is the model class for table "p1000".
 *
 * @property integer $id
 * @property string $jenisCorp
 */
class Jenispt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p1000';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db4');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'jenisCorp'], 'required'],
            [['ID'], 'integer'],
            [['jenisCorp'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenisCorp' => 'Jenis Corp',
        ];
    }
}

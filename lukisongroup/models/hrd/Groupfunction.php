<?php

namespace lukisongroup\models\hrd;

use Yii;

/**
 * This is the model class for table "u0003a".
 *
 * @property integer $GF_ID
 * @property string $GF_NM
 * @property integer $SORT
 */
class Groupfunction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u0003a';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT'], 'integer'],
            [['GF_NM'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GF_ID' => 'Gf  ID',
            'GF_NM' => 'Grp Fnction',
            'SORT' => 'Sort',
        ];
    }
}

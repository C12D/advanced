<?php

namespace lukisongroup\models\hrd;

use Yii;

/**
 * This is the model class for table "u0003b".
 *
 * @property integer $SEQ_ID
 * @property string $SEQ_NM
 */
class Groupseqmen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u0003b';
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
            [['SEQ_NM'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SEQ_ID' => 'Seq  ID',
            'SEQ_NM' => 'Seqmen',
        ];
    }
}

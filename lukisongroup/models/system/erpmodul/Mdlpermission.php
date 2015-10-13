<?php

namespace lukisongroup\models\system\erpmodul;

use Yii;

/**
 * This is the model class for table "modul_permission".
 *
 * @property string $ID
 * @property string $USER_ID
 * @property string $MODUL_ID
 * @property integer $STATUS
 * @property integer $CREATE
 * @property integer $EDIT
 * @property integer $TOMBOL1
 * @property integer $TOMBOL2
 * @property integer $TOMBOL3
 * @property integer $TOMBOL4
 * @property integer $TOMBOL5
 * @property integer $TOMBOL6
 * @property integer $TOMBOL7
 * @property integer $TOMBOL8
 * @property integer $TOMBOL9
 * @property integer $TOMBOL10
 */
class Mdlpermission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modul_permission';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db1');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'MODUL_ID', 'STATUS', 'CREATE', 'EDIT', 'TOMBOL1', 'TOMBOL2', 'TOMBOL3', 'TOMBOL4', 'TOMBOL5', 'TOMBOL6', 'TOMBOL7', 'TOMBOL8', 'TOMBOL9', 'TOMBOL10'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USER_ID' => 'User  ID',
            'MODUL_ID' => 'Modul  ID',
            'STATUS' => 'Status',
            'CREATE' => 'Create',
            'EDIT' => 'Edit',
            'TOMBOL1' => 'Tombol1',
            'TOMBOL2' => 'Tombol2',
            'TOMBOL3' => 'Tombol3',
            'TOMBOL4' => 'Tombol4',
            'TOMBOL5' => 'Tombol5',
            'TOMBOL6' => 'Tombol6',
            'TOMBOL7' => 'Tombol7',
            'TOMBOL8' => 'Tombol8',
            'TOMBOL9' => 'Tombol9',
            'TOMBOL10' => 'Tombol10',
        ];
    }
}

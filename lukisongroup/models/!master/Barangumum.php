<?php

namespace app\models\master;

use Yii;

use app\models\master\Kategori;
use app\models\master\Unitbarang;
use app\models\master\Suplier;
use app\models\master\Perusahaan;
use app\models\master\Tipebarang;

/**
 * This is the model class for table "b1000".
 *
 * @property string $id
 * @property string $kd_barang
 * @property string $nm_barang
 * @property string $kd_type
 * @property string $kd_kategori
 * @property string $kd_unit
 * @property string $kd_supplier
 * @property string $kd_distributor
 * @property string $parent
 * @property double $hpp
 * @property double $harga
 * @property string $barcode
 * @property string $image
 * @property string $NOTE
 * @property string $kd_corp
 * @property string $kd_cab
 * @property string $kd_dep
 * @property integer $status
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 * @property string $data_all
 */
class Barangumum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b1000';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db4');
    }

	public function getType()
    {
        return $this->hasOne(Tipebarang::className(), ['KD_TYPE' => 'KD_TYPE']);
    }

	public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['KD_KATEGORI' => 'KD_KATEGORI']);
    }

	public function getUnit()
    {
        return $this->hasOne(Unitbarang::className(), ['KD_UNIT' => 'KD_UNIT']);
    }

	public function getSuplier()
    {
        return $this->hasOne(Suplier::className(), ['KD_SUPPLIER' => 'KD_SUPPLIER']);
    }

	public function getPerusahaan()
    {
        return $this->hasOne(Perusahaan::className(), ['KD_CORP' => 'KD_CORP']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_BARANG', 'NM_BARANG','STATUS','KD_TYPE','KD_KATEGORI','KD_UNIT', 'KD_SUPPLIER','KD_CORP'], 'required'],
            [['HPP', 'HARGA'], 'number'],
            [['HPP', 'HARGA'], 'required'],
            [['NOTE', 'DATA_ALL'], 'string'],
            [['STATUS'], 'integer'],
            [['CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['KD_BARANG', 'PARENT'], 'string', 'max' => 20],
            [['NM_BARANG', 'IMAGE'], 'string', 'max' => 200],
            [['KD_TYPE', 'KD_KATEGORI', 'KD_UNIT', 'KD_SUPPLIER', 'KD_DISTRIBUTOR', 'KD_CORP', 'KD_CAB', 'KD_DEP'], 'string', 'max' => 5],
            [['BARCODE'], 'string', 'max' => 15],
            [['CREATED_BY', 'UPDATED_BY'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'KD_BARANG' => 'Kode Barang',
            'NM_BARANG' => 'Nama Barang',
            'KD_TYPE' => 'Kode Type',
            'KD_KATEGORI' => 'Kode Kategori',
            'KD_UNIT' => 'Kode Unit',
            'KD_SUPPLIER' => 'Kode Supplier',
            'KD_DISTRIBUTOR' => 'Kode Distributor',
            'PARENT' => 'PARENT',
            'HPP' => 'HPP',
            'HARGA' => 'HARGA',
            'BARODE' => 'BARCODE',
            'IMAGE' => 'IMAGE',
            'NOTE' => 'NOTE',
            'KD_CORP' => 'Kd Corp',
            'KD_CAB' => 'Kd Cab',
            'KD_DEP' => 'Kd Dep',
            'STATUS' => 'STATUS',
            'CREATED_BY' => 'Created By',
            'CREATED_AT' => 'Created At',
            'UPDATED_BY' => 'Updated By',
            'UPDATED_AT' => 'Updated At',
            'DATA_ALL' => 'Data All',
        ];
    }
}

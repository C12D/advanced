<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use lukisongroup\models\master\Suplier;
use lukisongroup\models\master\Barangumum;
use lukisongroup\models\esm\po\Purchasedetail;
use lukisongroup\models\esm\Barang;
/* @var $this yii\web\View */
/* @var $model lukisongroup\models\esm\po\Purchaseorder */

$this->title = 'Detail PO';
$this->params['breadcrumbs'][] = ['label' => 'Purchaseorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    td {vertical-align: top; padding: 2px;}
</style>

<div class="purchaseorder-view" style="margin:0px 20px;">
<br/><br/>

    <?php 
        $sup = Suplier::find()->where(['KD_SUPPLIER'=>$model->KD_SUPPLIER])->one(); 
        $pod = Purchasedetail::find()->where(['KD_PO'=>$model->KD_PO])->all(); 
    ?>

    <center>
        <h3 style="margin:0px;"><u>Purchase Order</u></h3>
        <h4 style="margin:0px;">No. <?= $model->KD_PO; ?></h4>
    </center>

    <br/>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6">

        <table>
            <tr>
                <td>Company</td><td>:</td>
                <td>
                    <strong>PT. Efenbi Sukses Makmur</strong>
                </td>
            </tr>

            <tr>
                <td>Address</td><td>:</td>
                <td>
                    <strong>
                        Ruko Demansion Blok C-12
                    </strong>
                </td>
            </tr>

            <tr>
                <td>Phone</td><td>:</td>
                <td>
                    <strong>
                        Ruko Demansion Blok C-12
                    </strong>
                </td>
            </tr>
        </table>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-6">

        <table>
            <tr>
                <td>Bill To</td><td>:</td>
                <td>
                    <strong><?= $sup->NM_SUPPLIER ?></strong>
                </td>
            </tr>

            <tr>
                <td>Address</td><td>:</td>
                <td><?= $sup->ALAMAT ?></td>
            </tr>

            <tr>
                <td>Phone</td><td>:</td>
                <td><?= $sup->TLP ?>
                </td>
            </tr>

            <tr>
                <td>Fax</td><td>:</td>
                <td><?= $sup->FAX ?>
                </td>
            </tr>

        </table>
      </div>
    </div>

    <br/><br/>

<style type="text/css">
    .tbl {width:100%; }    
    .tbl tr td{ padding: 5px; border:1px solid #333; border-top: 1px solid #f2f2f2;  border-bottom: 0px;}
    .tbl tr .head{ padding:5px; background-color:#A1A1E6; font-weight:bold; font-size:12pt; border-bottom: 1px solid #333; border-top: 1px solid #333;}
</style>

    <table class="tbl">
        <tr>
            <td class="head">No.</td>
            <td class="head">Kode Barang</td>
            <td class="head">Nama Barang</td>
            <td class="head">Quantity</td>
            <td class="head">Satuan Barang</td>
            <td class="head">Harga</td>
            <td class="head">Total Harga</td>
        </tr>


        <tbody>
        <?php 
            $total = 0;
            $a=0; foreach ($pod as $key => $val) { $a=$a+1;

            $ckBrg = explode('.', $val->KD_BARANG);
            if($ckBrg[0] == 'BRG'){
                $nmBrg = Barang::find('NM_BARANG')->where(['KD_BARANG'=>$val->KD_BARANG])->one();
            } else if($ckBrg[0] == 'BRGU') {
                $nmBrg = Barangumum::find('NM_BARANG')->where(['KD_BARANG'=>$val->KD_BARANG])->one();
            }

            $ckUnit = preg_replace("/[^A-Z\']/", '', $val->UNIT);
            if($ckUnit == 'U'){
                $brg = lukisongroup\models\master\Unitbarang::find('NM_UNIT')->where(['KD_UNIT'=>$val->UNIT])->one();
            } else {
                $brg = lukisongroup\models\esm\Unitbarang::find('NM_UNIT')->where(['KD_UNIT'=>$val->UNIT])->one();
            }
        ?>

            <tr>
                <td><?= $a ?></td>
                <td><?= $val->KD_BARANG ?></td>
                <td><?= $nmBrg->NM_BARANG ?></td>
                <td><?= $val->QTY ?></td>
                <td><?= $brg->NM_UNIT ?></td>
                <td>
                    <?= Yii::$app->mastercode->Rupiah($val->HARGA) ?>
                </td>

                <?php $ttl = $val->HARGA * $val->QTY; ?>
                <td><?= Yii::$app->mastercode->Rupiah($ttl) ?></td>
            </tr>
            <?php   
                $total = $total + $ttl; }

                $pjk = $model->PAJAK;
                $disc = $model->DISC;
                $hslPjk = ($pjk / 100) * ($total - $disc);

                $hsl = $total - $disc + $hslPjk ;
            ?>


            <tr  style="border:0px !important;">
                <td colspan="5" rowspan="4" style="border:1px solid #333; font-size:15pt;">Terbilang : <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>
                    <?php 
                        $kd = Yii::$app->mastercode->Terbilang($hsl); 
                        echo $kd;
                    ?> Rupiah</b>
                </td>
                <td style="text-align:right; background-color:#f2f2f2; border:1px solid #333;"><b>Sub Total</b></td>
                <td style="border:1px solid #333; background-color:#f2f2f2;"><b><?= Yii::$app->mastercode->Rupiah($total) ?></b></td>
            </tr>


            <tr  style="border:0px !important;">
                <td style="text-align:right; background-color:#f2f2f2; border:1px solid #333;"><b>Disc.</b></td>
                <td style="border:1px solid #333; background-color:#f2f2f2;"><b><?= Yii::$app->mastercode->Rupiah($disc) ?></b></td>
            </tr>
            <tr  style="border:0px !important;">
                <td style="text-align:right; background-color:#f2f2f2; border:1px solid #333;"><b>PPN <?= $pjk; ?> %</b></td>
                <td style="border:1px solid #333; background-color:#f2f2f2;"><b><?= Yii::$app->mastercode->Rupiah($hslPjk) ?></b></td>
            </tr>

            <tr  style="border:0px !important;">
                <td style="text-align:right; background-color:#f2f2f2; border:1px solid #333;"><b>Grand Total</b></td>
                <td style="border:1px solid #333; background-color:#f2f2f2;"><b><?= Yii::$app->mastercode->Rupiah($hsl) ?></b></td>
            </tr>

        </tbody>
    </table>

    <br/><br/>
    <?php 
        echo Html::a('<i class="fa fa-print fa-fw"></i> Cetak', ['cetakpdf','kdpo'=>$model->KD_PO], ['target' => '_blank', 'class' => 'btn btn-success']);
    ?>
</div>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use lukisongroup\models\master\Suplier;
use lukisongroup\models\master\Barangumum;
use lukisongroup\models\master\Nmperusahaan;
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

            <b><?= $sup->NM_SUPPLIER; ?></b><br/>
            <?= $sup->ALAMAT; ?><br/>
            <?= $sup->KOTA; ?><br/>
                <table>
                    <tr>
                        <td>Telp / Fax</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>&nbsp;<?= $sup->TLP; ?> / <?= $sup->FAX; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>&nbsp;<?= $sup->EMAIL; ?></td>
                    </tr>
                </table>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-6">

                <table>
                    <tr>
                        <td>Date</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>&nbsp;<?php $tgl = explode(' ', $model->CREATE_AT); echo $tgl[0]; ?></td>
                    </tr>
                    <tr>
                        <td>No. Order</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>&nbsp;<?= $model->KD_PO; ?></td>
                    </tr>
                    <tr>
                        <td>Order By</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>&nbsp;<?= Yii::$app->user->identity->username; ?></td>
                    </tr>
                    <tr>
                        <td title="Estimasi Pengiriman Barang">ETD</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>&nbsp;<?= $model->ETD; ?></td>
                    <tr>
                        <td title="Estimasi Kedatangan Barang">ETA</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>&nbsp;<?= $model->ETA; ?></td>
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
                $devCost = $model->DELIVERY_COST;
                $hslPjk = ($pjk / 100) * ($total - $disc);

                $hsl = $total - $disc + $devCost + $hslPjk ;
            ?>


            <tr  style="border:0px !important;">
                <td colspan="5" rowspan="5" style="border:1px solid #333; font-size:15pt;">Terbilang : <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>
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
                <td style="text-align:right; background-color:#f2f2f2; border:1px solid #333;"><b>Delv. Cost</b></td>
                <td style="border:1px solid #333; background-color:#f2f2f2;"><b><?= Yii::$app->mastercode->Rupiah($devCost) ?></b></td>
            </tr>

            <tr  style="border:0px !important;">
                <td style="text-align:right; background-color:#f2f2f2; border:1px solid #333;"><b>Grand Total</b></td>
                <td style="border:1px solid #333; background-color:#f2f2f2;"><b><?= Yii::$app->mastercode->Rupiah($hsl) ?></b></td>
            </tr>

        </tbody>
    </table>

<br/><br/>
<?php 
    $ship = Nmperusahaan::find()->where(['ID' => $model->SHIPPING])->one(); 
    $bill = Nmperusahaan::find()->where(['ID' => $model->BILLING])->one(); 
?>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <h3><u>&nbsp;&nbsp;Shipping Address :&nbsp;&nbsp;</u></h3>
            <?php
                echo '<b>'.$ship->NM_ALAMAT.'</b></br>';
                echo $ship->ALAMAT_LENGKAP.'</br></br>';
                echo 'Tlp : '.$ship->TLP.'</br>';
                echo 'Fax : '.$ship->FAX.'</br>';
                echo 'CP&nbsp; : '.$ship->CP.'</br>';
            ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <h3><u>&nbsp;&nbsp;Billing Address :&nbsp;&nbsp;</u></h3>
            <?php
                echo '<b>'.$bill->NM_ALAMAT.'</b></br>';
                echo $bill->ALAMAT_LENGKAP.'</br></br>';
                echo 'Tlp : '.$bill->TLP.'</br>';
                echo 'Fax : '.$bill->FAX.'</br>';
                echo 'CP&nbsp; : '.$bill->CP.'</br>';
            ?>
        </div>
    </div>

    <br/><br/>
    <b>Note :</b><br/><?= $model->NOTE; ?>

    <br/><br/>
    <br/><br/>
    <?php 
        echo Html::a('<i class="fa fa-print fa-fw"></i> Cetak', ['cetakpdf','kdpo'=>$model->KD_PO], ['target' => '_blank', 'class' => 'btn btn-success']);
    ?>
</div>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
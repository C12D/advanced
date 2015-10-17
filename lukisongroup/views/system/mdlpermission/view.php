<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->sideCorp = 'PT.Lukisongroup';                        /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'admin';                                  /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'ERP - Administrator');        /* title pada header page */
?>
<div class="mdlpermission-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'USER_ID',
            'MODUL_ID',
            'STATUS',
            'CREATE',
            'EDIT',
            'TOMBOL1',
            'TOMBOL2',
            'TOMBOL3',
            'TOMBOL4',
            'TOMBOL5',
            'TOMBOL6',
            'TOMBOL7',
            'TOMBOL8',
            'TOMBOL9',
            'TOMBOL10',
        ],
    ]) ?>

</div>

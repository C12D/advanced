<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->sideCorp = 'PT.Lukisongroup';                        /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'admin';                                  /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'LG - Administrator');         /* title pada header page */
?>
<div class="mdlpermission-index">

    <p>
        <?= Html::a('Create ERP Permission', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
			['class' => 'yii\grid\ActionColumn'],
            //'ID',
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
    ]); ?>

</div>

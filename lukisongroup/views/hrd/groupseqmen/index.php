<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->sideCorp = 'Modul HRM';                     /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'hrd_modul';                     /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Group Seqment');     /* title pada header page */
?>
<div class="groupseqmen-index">
    <p>
        <?= Html::a('Create Groupseqmen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SEQ_ID',
            'SEQ_NM',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

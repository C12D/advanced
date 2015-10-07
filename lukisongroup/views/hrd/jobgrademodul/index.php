<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->sideCorp = 'Modul HRM';                            		/* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'hrd_modul';                            		/* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Modul JobGrade');     			/* title pada header page */
?>
<div class="jobgrademodul-index">

    <p>
        <?= Html::a('Create Jobgrademodul', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'GF_ID',
            'SEQ_ID',
            'JOBGRADE_ID',
            'JOBGRADE_NM',
            // 'SORT',
            // 'JOBGRADE_STS',
            // 'JOBGRADE_DCRP:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

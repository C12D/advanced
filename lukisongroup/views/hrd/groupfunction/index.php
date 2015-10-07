<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->sideCorp = 'Modul HRM';                      /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'hrd_modul';                      /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Group Function');     /* title pada header page */

?>
<div class="groupfunction-index">

    <p>
        <?= Html::a('Create Groupfunction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'GF_ID',
            'GF_NM',
            'SORT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

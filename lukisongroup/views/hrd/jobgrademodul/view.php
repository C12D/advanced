<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->sideCorp = 'Modul HRM';                            		/* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'hrd_modul';                            		/* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Detail View Modul JobGrade');     /* title pada header page */
?>
<div class="jobgrademodul-view">
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
            'GF_ID',
            'SEQ_ID',
            'JOBGRADE_ID',
            'JOBGRADE_NM',
            'SORT',
            'JOBGRADE_STS',
            'JOBGRADE_DCRP:ntext',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$this->sideCorp = 'Modul HRM';                            /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'hrd_modul';                            /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Detail View JobGrade');    /* title pada header page */

?>
<div class="jobgrade-view">
    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID, 'JOBGRADE_ID' => $model->JOBGRADE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID, 'JOBGRADE_ID' => $model->JOBGRADE_ID], [
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
            'JOBGRADE_ID',
            'JOBGRADE_NM',
            'SORT',
            'JOBGRADE_STS',
            'JOBGRADE_DCRP:ntext',
        ],
    ]) ?>

</div>

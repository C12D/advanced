<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->sideCorp = 'Modul HRM';                            	   /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'hrd_modul';                            	   /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'DetailView Group Function');     /* title pada header page */

?>
<div class="groupfunction-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->GF_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->GF_ID], [
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
            'GF_ID',
            'GF_NM',
            'SORT',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\esm\Unitbarang */

$this->title = $model->KD_UNIT;
$this->params['breadcrumbs'][] = ['label' => 'Unit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'ESM Request Order';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'esm_esm';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>
<div class="unitbarang-view">

    <h1><?= Html::encode($this->title) ?></h1>
	<div style="border-top:1px solid #c6c6c6; ">&nbsp;</div> 


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'ID',
            'KD_UNIT',
            'NM_UNIT',
            'QTY',
            'SIZE',
            'WEIGHT',
            'COLOR',
            'NOTE:ntext',
   //         'STATUS',
  //          'CREATED_BY',
 //           'CREATED_AT',
//            'UPDATED_AT',
        ],
    ]) ?>

</div>

    <p>
        <?= Html::a('<i class="fa fa-pencil"></i>&nbsp;&nbsp;Ubah', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
    </p>
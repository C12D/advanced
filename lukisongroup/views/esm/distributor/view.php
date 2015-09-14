<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\esm\Distributor */

$this->title = $model->KD_DISTRIBUTOR;
$this->params['breadcrumbs'][] = ['label' => 'Distributor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->sideCorp = 'ESM Request Order';                       /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'esm_esm';                                 /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Data Master');         /* title pada header page */
$this->params['breadcrumbs'][] = $this->title;                      /* belum di gunakan karena sudah ada list sidemenu, on plan next*/

?>
<div class="distributor-view">

    <h1><?= Html::encode($this->title) ?></h1>
	<div style="border-top:1px solid #c6c6c6; ">&nbsp;</div> 


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'KD_DISTRIBUTOR',
            'NM_DISTRIBUTOR',
            'ALAMAT:ntext',
            'PIC',
            'TLP1',
            'TLP2',
            'FAX',
            'EMAIL:email',
            'WEBSITE',
            'NOTE:ntext',
        ],
    ]) ?>

    <p>
        <?= Html::a('<i class="fa fa-pencil"></i>&nbsp;&nbsp;Ubah', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o"></i>&nbsp;&nbsp;Hapus', ['delete', 'id' => $model->ID], [
			'class' => 'btn btn-danger',
			'data' => [
			    'confirm' => 'Are you sure you want to delete this item?',
			    'method' => 'post',
			],
        ]) ?>
    </p>
</div>

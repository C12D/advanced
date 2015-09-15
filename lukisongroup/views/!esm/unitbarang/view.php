<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\esm\Unitbarang */
$this->sideMenu = 'esm';
$this->title = $model->KD_UNIT;
$this->params['breadcrumbs'][] = ['label' => 'Unit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unitbarang-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

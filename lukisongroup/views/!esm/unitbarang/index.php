<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitbarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->sideMenu = 'esm';
$this->title = 'Unit';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="unitbarang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Unit Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'ID',
            'KD_UNIT',
            'NM_UNIT',
            'QTY',
            'SIZE',
            // 'weight',
            // 'color',
            // 'NOTE:ntext',
            // 'STATUS',
            // 'CREATED_BY',
            // 'CREATED_AT',
            // 'UPDATED_AT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

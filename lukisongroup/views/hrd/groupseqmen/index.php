<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\hrd\GroupseqmenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Groupseqmens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupseqmen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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

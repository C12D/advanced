<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\hrd\DeptsubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Deptsubs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deptsub-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Deptsub', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'DEP_SUB_ID',
            'DEP_ID',
            'DEP_SUB_NM',
            'DEP_SUB_STS',
            'DEP_SUB_AVATAR',
            // 'DEP_SUB_DCRP:ntext',
            // 'SORT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

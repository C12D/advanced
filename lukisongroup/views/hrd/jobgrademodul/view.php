<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Jobgrademodul */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Jobgrademoduls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobgrademodul-view">

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

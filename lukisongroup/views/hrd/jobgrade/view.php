<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Jobgrade */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Jobgrades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobgrade-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

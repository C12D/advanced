<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Deptsub */

$this->title = $model->DEP_SUB_ID;
$this->params['breadcrumbs'][] = ['label' => 'Deptsubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deptsub-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->DEP_SUB_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->DEP_SUB_ID], [
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
            'DEP_SUB_ID',
            'DEP_ID',
            'DEP_SUB_NM',
            'DEP_SUB_STS',
            'DEP_SUB_AVATAR',
            'DEP_SUB_DCRP:ntext',
            'SORT',
        ],
    ]) ?>

</div>

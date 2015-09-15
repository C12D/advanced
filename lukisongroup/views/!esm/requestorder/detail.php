<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\esm\ro\Requestorder;
use app\models\esm\ro\RequestorderSearch;

/* @var $this yii\web\View */
/* @var $model app\models\esm\ro\Requestorder */

?>

<div class="requestorder-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'KD_RO',
            'NOTE:ntext',
            'ID_USER',
            'KD_CORP',
            'KD_CAB',
            'KD_DEP',
            'STATUS',
            'CREATED_AT',
            'UPDATED_ALL',
            'DATA_ALL:ntext',
        ],
    ]) ?>

</div>
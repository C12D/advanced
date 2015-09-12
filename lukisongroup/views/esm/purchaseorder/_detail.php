<?php
use yii\helpers\Html;
use yii\grid\GridView;

?>
<form action="../purchaseorder/simpan" method="post">
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NM_BARANG',
            'QTY',
            'UNIT',
			[
				'class' => 'yii\grid\CheckboxColumn',
				'checkboxOptions' => function ($model, $key, $index, $column) {
					return ['value' => $model->KD_BARANG];
				}
			]
        ],
		
    ]); 
	?>
	<?php echo $ids; ?>
	<input type="text" name="tgl" value="<?php echo date("Y-m-d").'.'.Yii::$app->user->identity->username; ?>" />
	<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	  </div>
</form>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;

//use terlebih dahulu
use yii\bootstrap\Modal;

use lukisongroup\models\esm\ro\Rodetail;
use lukisongroup\models\esm\ro\RodetailSearch;

/* @var $this yii\web\View */
/* @var $model lukisongroup\models\esm\po\Purchaseorder */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
	<div class="col-xs-12 col-md-3">

    <?php Pjax::begin(['id'=>'pjax-users']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'KD_RO',
		[
            'format'=>'raw',
            'value' => function ($data){
                $count = \lukisongroup\models\esm\ro\Rodetail::find()
                    ->where([
                        'KD_RO'=>$data->KD_RO,
                    ])
                    ->count();
 
                if(!empty($count)){
                    return  Html::a('<button type="button" class="btn btn-success btn-xs">View</button>',['detail','kd_ro'=>$data->KD_RO,'ids'=>'adw'],[
                                                    'data-toggle'=>"modal",
                                                    'data-target'=>"#myModal",
                                                    'data-title'=> $data->KD_RO,
                                                    ]); // ubah ini
                } else {
                    return '<button type="button" class="btn btn-danger btn-xs">No Data</button>';
                }
            }
        ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
	
<?php
$this->registerJs("
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title') 
        var href = button.attr('href') 
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");

Modal::begin([
    'id' => 'myModal',
    'header' => '<h4 class="modal-title">...</h4>',
]);
 
echo '...';
 
Modal::end();
?>
	
	
		<!-- div class="list-group">
			<?php $a = 0; foreach($que as $qu){ $a=$a+1; ?>
				<a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal<?php echo $a; ?>"><?php echo $qu->KD_RO; ?> - <?php echo $qu->KD_CORP; ?> - <?php echo $qu->KD_DEP; ?></a>
				
				<?php $detail = Rodetail::find()->where('STATUS <> 3')->andwhere(['KD_RO' => $qu->KD_RO])->all();   ?>
				<!-- Modal -- >
				
				<div class="modal fade" id="myModal<?php echo $a; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Detail : <?php echo $qu->KD_RO; ?> - <?php echo $qu->KD_CORP; ?> - <?php echo $qu->KD_DEP; ?></h4>
					  </div>
					  <div class="modal-body">
					  
						<table class="table table-bordered table-hover table-striped">
							<thead style="background-color:orange;">
								<tr>
									<th>#</th>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Qty</th>
									<th>Unit</th>
									<th>Pilih</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $b = 0; foreach($detail as $det){ $b=$b+1; ?>
									<tr>
										<th scope="row"><?php echo $b; ?></th>
										<td><?php echo $det->KD_BARANG; ?></td>
										<td><?php echo $det->NM_BARANG; ?></td>
										<td><?php echo $det->QTY; ?></td>
										<td><?php echo $det->UNIT; ?></td>
										<td><input type="checkbox" name="pilih[]" value="<?php echo $det->ID; ?>"/></td>
									</tr>
								<?php } ?>
							</tbody>
						
						</table>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div>
					</div>
				  </div>
				</div>

			<?php } ?>
			
			
		</div -->
	</div>
  
	<div class="col-xs-12 col-md-9">

		<table class="table table-bordered table-hover table-striped">
			<thead style="background-color:orange;">
				<tr>
					<th>#</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Qty</th>
					<th>Unit</th>
					<th>Pilih</th>
				</tr>
			</thead>
			
			<tbody>
			
			</tbody>
		
		</table>	
	</div>
</div>

<!--
<div class="purchaseorder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KD_PO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_SUPPLIER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_AT')->textInput() ?>

    <?= $form->field($model, 'APPROVE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APPROVE_AT')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'NOTE')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

	<iframe src="../requestorder" style="width:100%; height:600px;">
	</iframe>
</div>
-->
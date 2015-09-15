<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
/*
use app\models\esm\ro\Requestorder;
use app\models\esm\ro\RequestorderSearch;
use app\models\esm\ro\Roatribute;

use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\widgets\FileInput;


*/

use app\models\esm\ro\Rodetail;
use app\models\master\Barangumum;


use yii\grid\GridView;
use yii\data\ActiveDataProvider;

use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\models\esm\ro\Requestorder */
/* @var $form yii\widgets\ActiveForm */

/*
$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL,  'action' => ['controller/action'],]);

//$customers = Rodetail::find()->where('KD_RO = 1')->all();
//$reqorder->rodet->NO_URUT;
//$customers = Rodetail::find()->where(['KD_RO = 1' ])->all();


echo FormGrid::widget([
	'model'=>$rodetail,
	'form'=>$form,
	'autoGenerateColumns'=>true,
	'rows'=>[
        [
            'contentBefore'=>'<legend class="text-info"><small>Buat Permintaan Barang</small></legend>',
            'attributes'=>[       // 2 column layout
				'NO_URUT' => ['type' => Form::INPUT_TEXT],
				'KD_BARANG' => ['type' => Form::INPUT_TEXT],
//				'NM_BARANG' => ['type' => Form::INPUT_TEXT],
				'QTY' => ['type' => Form::INPUT_TEXT],
            ]
        ],
		
	],		
]);
*/

$id=$_GET['id'];



$form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['esm/requestorder/simpan?id='.$id],
]);


	$brg = ArrayHelper::map(Barangumum::find()->all(), 'KD_BARANG', 'NM_BARANG');
?>
<?php echo $form->field($rodetail, 'CREATED_AT')->hiddenInput(['value' => date('Y-m-d H:i:s')])->label(false);	 ?>	
<?php echo $form->field($rodetail, 'NM_BARANG')->hiddenInput(['value' => ''])->label(false);	 ?>	

<div class="row">
  <div class="col-xs-3"><?php echo $form->field($rodetail, 'KD_RO')->textInput(['value' => $id, 'readonly' => true]); ?></div>
  <div class="col-xs-3"><?php echo $form->field($rodetail, 'KD_BARANG')->dropDownList($brg, ['prompt'=>' -- Pilih Salah Satu --','onchange' => '$("#rodetail-nm_barang").val($(this).find("option:selected").text())']); ?></div>
  <div class="col-xs-3"><?php echo $form->field($rodetail, 'QTY')->textInput(['maxlength' => true, 'placeholder'=>'Jumlah Barang']); ?></div>
  <div class="col-xs-3"><?php echo $form->field($rodetail, 'NOTE')->textInput(['maxlength' => true, 'placeholder'=>'Catatan Barang']); ?></div>
  <div class="col-xs-2"><?php echo Html::submitButton( 'Simpan', ['class' => 'btn btn-success']); ?></div>
</div>


<?php

 
 ActiveForm::end(); 
 
echo "<br/><br/>";

        $dataProvider = new ActiveDataProvider([
            'query' => Rodetail::find()->where(['KD_RO' => $id]),
        ]);
/*		
		$provider = new ArrayDataProvider([
		    'allModels' => Rodetail::find()->all(), //->where(['KD_RO' => $id])->all(),
		  /*  'sort' => [
		        'attributes' => ['KD_BARANG', 'NM_BARANG', 'QTY','ID'],
		    ],
			* /
		  //  'pagination' => [
		  //      'pageSize' => 10,
		  //  ],
		]);
		*/
		var_dump($dataProvider);
//		print_r($provider);
		echo GridView::widget([
        'dataProvider' => $dataProvider,
		
        'columns' => [
         //specify the colums you wanted here
			'KD_BARANG', 'NM_BARANG', 'QTY',  'NOTE', 
			
			
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{hapus}',
				'buttons' => [
					'hapus' => function ($model) {
						return Html::a(
							'<span class="glyphicon glyphicon-trash"></span>',['hapus','id'=>'this.ID']
						);
					},
				],

				//'botton'=>[
				//	'delete'=> function()
				//],
			],
			
        ],
		]);
		
/*
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'responsive'=>true,
    'hover'=>true
]);*/
?>

<!-- div class="requestorder-form">

    <?php // $form = ActiveForm::begin(); 
	
	
	?>
	<?php
$form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['esm/requestorder/create'],
]);
	?>

    <?= $form->field($model, 'KD_RO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_USER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_CORP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_CAB')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_DEP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'CREATED_AT')->textInput() ?>

    <?= $form->field($model, 'UPDATED_ALL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA_ALL')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'NOTE')->textarea(['rows' => 6]) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div -->

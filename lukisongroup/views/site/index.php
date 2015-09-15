<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\FileInput;
use kartik\builder\FormGrid;
$this->title = 'Workbench <i class="fa  fa fa-coffee"></i> ' . $model->EMP_NM . ' ' . $model->EMP_NM_BLK .'</a>';

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL,'options'=>['enctype'=>'multipart/form-data']]);


$ProfAttribute1 = [
		[
			'label'=>'',
			'attribute' =>'EMP_IMG',
			'value'=>Yii::getAlias('@HRD_EMP_UploadUrl') .'/'.$model->EMP_IMG,
        //'group'=>true ,
        //'groupOptions'=>[
        //	'value'=>Yii::getAlias('@HRD_EMP_UploadUrl') .'/'.$model->EMP_IMG,
        //],
        'format'=>['image',['width'=>'100','height'=>'75']],
			//'inputWidth'=>'20%'
			//'inputContainer' => ['class'=>'col-md-1'],
		],
];
		
$ProfAttribute2 = [
		[
			'attribute' =>	'EMP_NM',
			//'inputWidth'=>'40%'					
		],
		[
			'attribute' =>	'EMP_NM_BLK',
			//'inputWidth'=>'40%'
		],
		[
			'attribute' =>	'EMP_KTP' ,
		],
		
	];

	$ProfAttribute3 = [
		[	
			'attribute' =>	'EMP_ALAMAT' ,
		],
		[
			'attribute' =>	'EMP_ZIP' ,
		],
		[
			'attribute' =>	'EMP_TLP' ,
		],
				
	];
	
	
    $attribute = [
    [
        //'attribute' =>	'EMP_IMG' ,
        'label'=>'',
        'value'=>Yii::getAlias('@HRD_EMP_UploadUrl') .'/'.$model->EMP_IMG,
        //'group'=>true ,
        //'groupOptions'=>[
        //	'value'=>Yii::getAlias('@HRD_EMP_UploadUrl') .'/'.$model->EMP_IMG,
        //],
        'format'=>['image',['class'=>'img-circle', 'alt'=>'Cinque Terre','width'=>'150','height'=>'100']],
        'type' => DetailView::INPUT_FILEINPUT,
        'widgetOptions'=>[
            'pluginOptions' => [
                'showPreview' => true,
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false
            ],

        ],
    ],
    [
        'attribute' =>	'EMP_CORP_ID',
        'label'=>'',
        'value'=>$dataProvider[0]['corpOne']->CORP_NM,
    ],
    [
        'attribute' =>	'EMP_JOIN_DATE',
        'format'=>'date',
        'type'=>DetailView::INPUT_DATE,
        'widgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
        'label'=>'',
        //'inputContainer' => ['class'=>'col-sm-3'],
        //'inputWidth'=>'40%'
    ],
];

//$form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);

$empProfile= DetailView::widget([
    'model' => $model,
    //'condensed'=>true,
    //'hover'=>true,
    'responsive'=>true,
    //'mode'=>DetailView::MODE_VIEW,

    'panel'=>[
        'heading'=>$model->EMP_NM . ' '.$model->EMP_NM_BLK,
        'type'=>DetailView::TYPE_INFO,
    ],
    
    'attributes'=>$attribute,
    //'bordered'=>false,
    //'striped' => true,
    //'options'=>[
    //'hAlign' => self::ALIGN_RIGHT,

    //],


]);
//ActiveForm::end();
?>




  <div class="container-fluid" >
<div class="row" >
	 <div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
		 <div class="row">
				<?php
					echo $this->render('_info', [
						'model' => $model,
					]) 
				?>
		 </div>
	 </div>


    <div class="col-xs-12 col-md-3 col-sm-3" >
		<div class="row">
            <?php
				echo DetailView::widget([
					'id'=>'profile1',
					'model' => $model,
					//'condensed'=>true,
					//'responsive'=>true,
					'hover'=>true,
					'attributes'=>$ProfAttribute1,		
					//'mode'=>DetailView::MODE_VIEW,
					'panel'=>[
						//'heading'=>$model->EMP_NM . ' '.$model->EMP_NM_BLK,
						'type'=>DetailView::TYPE_INFO,
						'headingOptions'=>[
								'template'=>'<div></div>',
						],
						'footer'=>true,
						'footerOptions'=>[
								'template'=>'<div></div>',
						],
					],				
				]);
			?>
		</div>
    </div>
 	 <div class="col-xs col-md-4 col-sm-4">
			<div class="row">
           <?php
				echo DetailView::widget([
					'id'=>'profile3',
					'model' => $model,
					'condensed'=>true,
					'responsive'=>true,
					'hover'=>true,
					'attributes'=>$ProfAttribute2 ,		
					//'mode'=>DetailView::MODE_VIEW,
					'panel'=>[
						//'heading'=>$model->EMP_NM . ' '.$model->EMP_NM_BLK,
						'type'=>DetailView::TYPE_INFO,
						'headingOptions'=>[
								'template'=>'<div></div>',
						],
						'footer'=>true,
						'footerOptions'=>[
								'template'=>'<div></div>',
						],
					],				
				]);
			?>
		</div>
    </div>
	 <div class="col-xs col-md-4 col-sm-4">
			<div class="row">
           <?php
				echo DetailView::widget([
					'id'=>'profile3',
					'model' => $model,
					'condensed'=>true,
					'responsive'=>true,
					'hover'=>true,
					'attributes'=>$ProfAttribute3 ,		
					//'mode'=>DetailView::MODE_VIEW,
					'panel'=>[
						//'heading'=>$model->EMP_NM . ' '.$model->EMP_NM_BLK,
						'type'=>DetailView::TYPE_INFO,
						'headingOptions'=>[
								'template'=>'<div></div>',
						],
						'footer'=>true,
						'footerOptions'=>[
								'template'=>'<div></div>',
						],
					],				
				]);
			?>
		</div>
    </div>
		</div>
    <div class="col-xs col-md-3 col-sm-3 ">
        <div class="list-group">
            <a ></a>
			  <?php
					 echo Html::listGroup([
						 [
						   'content' => 'Employe Task',
						   'url' => '#',
						   'badge' => '14',
						   'active' => true
						 ],
						 [
						   'content' => 'Open Purchase Order',
						   'url' => '#',
						   'badge' => '2'
						 ],
						 [
						   'content' => 'Stock Warehouse',
						   'url' => '#',
						   'badge' => '5'
						 ],
						 [
							 'content' => 'Request Order',
							 'url' => '#',
							 'badge' => '8'
						 ],
						 [
							 'content' => 'Jobs Request',
							 'url' => '#',
							 'badge' => '3'
						 ],
					]);     
				?>       
        </div>

</div>
<div class="row">
    <div class="col-md-4">
        <div class="list-group">
			<?php
            echo Html::panel([
						'id'=>'home1',
						'heading' => 'Standar Kerja',
						'body' => 'Standar kinerja (performance standards) adalah persyaratan tugas, fungsi atau perilaku yang ditetapkan oleh pemberi kerja sebagai sasaran yang harus dicapai oleh seorang karyawan',
						'postBody' => Html::listGroup([
							   [
								   'content' => 'Standar Kerja :',
								   'url' => '#',
								   'badge' => '14'
							   ],
							   [
								   'content' => 'Standar Kerja dua',
								   'url' => '#',
								   'badge' => '2'
							   ],

						   ]),
					],	
					Html::TYPE_INFO
					);				
				?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="list-group">
            <?php
					echo Html::panel([
						'id'=>'home2',
						'heading' => 'JobsDesk',
						'body' => 'merupakan panduan dari perusahaan kepada karyawannya dalam menjalankan tugas. ' .
                               'Semakin jelas job description yang diberikan, maka semakin mudah bagi karyawan untuk melaksanakan tugas sesuai dengan tujuan perusahaan, ' .
							   'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
						'postBody' => Html::listGroup([
							   [
								   'content' => 'JobsDesk1 :',
								   'url' => '#',
								   'badge' => '14'
							   ],
							   [
								   'content' => 'JobsDesk2 :',
								   'url' => '#',
								   'badge' => '2'
							   ],
							   [
								   'content' => 'JobsDesk3',
								   'url' => '#',
								   'badge' => '1'
							   ],
						   ]),
					],	
					Html::TYPE_INFO
					);				
				?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="list-group">
           <?php
					echo Html::panel([
						'id'=>'home3',
						'heading' => 'SOP',
						'body' => 'SOP (Standard Operating Procedures) adalah panduan hasil kerja yang diinginkan serta proses kerja yang harus dilaksanakan.' .
                                  'SOP dibuat dan di dokumentasikan secara tertulis yang memuat prosedur (alur proses) kerja secara rinci dan sistematis.',
						'postBody' => Html::listGroup([
							   [
								   'content' => 'SOP 1 :',
								   'url' => '#',
								   'badge' => '14'
							   ],
							   [
								   'content' => 'SOP 2',
								   'url' => '#',
								   'badge' => '2'
							   ],
							   [
								   'content' => 'SOP 3',
								   'url' => '#',
								   'badge' => '1'
							   ],
						   ]),
					],	
					Html::TYPE_INFO
					);				
				?>           
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <form role="form">
            <div class="form-group">

                <label for="exampleInputEmail1">
                    Email address
                </label>
                <input class="form-control" id="exampleInputEmail1" type="email">
            </div>
            <div class="form-group">

                <label for="exampleInputPassword1">
                    Password
                </label>
                <input class="form-control" id="exampleInputPassword1" type="password">
            </div>
            <div class="form-group">

                <label for="exampleInputFile">
                    File input
                </label>
                <input id="exampleInputFile" type="file">
                <p class="help-block">
                    Example block-level help text here.
                </p>
            </div>
            <div class="checkbox">

                <label>
                    <input type="checkbox"> Check me out
                </label>
            </div>
            <button type="submit" class="btn btn-default">
                Submit
            </button>
        </form>
    </div>
    <div class="col-md-9">
        <div class="page-header">
            <h1>
                LayoutIt! <small>Tanggal Prosess</small>
            </h1>
        </div>
    </div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
<?php ActiveForm::end(); ?>
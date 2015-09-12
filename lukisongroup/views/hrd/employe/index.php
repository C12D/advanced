<?php
/*
 * By ptr.nov
 * Load Config CSS/JS
 */
/* YII CLASS */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

/* TABLE CLASS DEVELOPE -> |DROPDOWN,PRIMARYKEY-> ATTRIBUTE */
use lukisongroup\models\hrd\Employe;
use lukisongroup\models\hrd\Corp;
use lukisongroup\models\hrd\Dept;
use lukisongroup\models\hrd\Jabatan;
use lukisongroup\models\hrd\Status;
use lukisongroup\models\system\side_menu\M1000;

/*	KARTIK WIDGET -> Penambahan componen dari yii2 dan nampak lebih cantik*/
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use kartik\sidenav\SideNav;

//use backend\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
//AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/

/*Title page Modul*/
$this->sideMenu = 'hrd_employee';
$this->title = Yii::t('app', 'Employe');
$this->params['breadcrumbs'][] = $this->title;

/*variable Dropdown*/
$Combo_Corp = ArrayHelper::map(Corp::find()->orderBy('SORT')->asArray()->all(), 'CORP_NM','CORP_NM');
$Combo_Dept = ArrayHelper::map(Dept::find()->orderBy('SORT')->asArray()->all(), 'DEP_NM','DEP_NM');
$Combo_Jab = ArrayHelper::map(Jabatan::find()->orderBy('SORT')->asArray()->all(), 'JAB_NM','JAB_NM');
$Combo_Status = ArrayHelper::map(Status::find()->orderBy('SORT')->asArray()->all(), 'STS_NM','STS_NM');

//--EMPLOYE ACTIVED--
$tab_employe= GridView::widget([
        'id'=>'active',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'], 
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view}',
				//'template' => '{view} {update}',
				//Yii::t('app', 'Emplo'),
			],			
			[
				/*Author -ptr.nov- image*/
               'attribute' => 'PIC',
               'format' => 'html', //'format' => 'image',
               'value'=>function($data){
                            return Html::img(Yii::getAlias('@HRD_EMP_UploadUrl') . '/'. $data->EMP_IMG, ['width'=>'40']);
                        },
            ],  
				'EMP_ID',
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' =>'EMP_NM',
                'readonly'=>function($model, $key, $index, $widget) {
                        return (10==$model->STATUS); // do not allow editing of inactive records
                    },
                'editableOptions' => [
                   'header' => 'Employe name',
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    //'options' => [
                    //    'pluginOptions' => ['min'=>0, 'max'=>5000]
                   // ]
                ],
                /*
                'editableOptions'=> function ($model, $key, $index, $widget) {
                        return [
                            'header'=>'Employe name',
                            'size'=>'md',
                        ];
                    }
                */
            ],

				'EMP_NM_BLK',			
            [
				/*Author -ptr.nov-*/
				'attribute' =>'corpOne.CORP_NM',
				'filter' => $Combo_Corp,
               // 'contentOptions'=>['class'=>'kv-sticky-column'],

			],
            [
				/*Author -ptr.nov-*/
				'attribute' =>'deptOne.DEP_NM',
				'filter' => $Combo_Dept,
			],
			[
				/*Author -ptr.nov-*/
				'attribute' =>'jabOne.JAB_NM',
				'filter' => $Combo_Jab,
			],
			[
				/*Author -ptr.nov-*/
				'attribute' =>'sttOne.STS_NM',
				'filter' => $Combo_Status,
			],
			[				
				'attribute' =>'EMP_JOIN_DATE',
				'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
				'filterWidgetOptions' =>([
					'attribute' =>'EMP_JOIN_DATE',
					'presetDropdown'=>TRUE,                
					'convertFormat'=>true,                
					'pluginOptions'=>[				
						'format'=>'Y-m-d',
						'separator' => ' TO ',
						'opens'=>'left'
					],

				//'pluginEvents' => [
				//	"apply.daterangepicker" => "function() { aplicarDateRangeFilter('EMP_JOIN_DATE') }",
				//] 
				]),
				
			],
            //['class' => 'yii\grid\CheckboxColumn'],
            //['class' => '\kartik\grid\RadioColumn'],
        ],
        'panel'=>[
            //'heading' =>true,// $hdr,//<div class="col-lg-4"><h8>'. $hdr .'</h8></div>',
            'type' =>GridView::TYPE_SUCCESS,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
            //'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add', '#', ['class'=>'btn btn-success']) . ' ' .
                //Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary']) . ' ' .
            //    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete  ', '#', ['class'=>'btn btn-danger'])
			'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create {modelClass}',
					['modelClass' => 'Employe',]),
					['create'], ['class' => 'btn btn-success']),
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'options'=>[
                'enablePushState'=>false,
                'id'=>'active',
                //'formSelector'=>'ddd1',
                //'options'=>[
                //    'id'=>'active'
               // ],
        ],
        'hover'=>true, //cursor select
        //'responsive'=>true,
        'responsiveWrap'=>true,
        'bordered'=>true,
        'striped'=>'4px',
        'autoXlFormat'=>true,
        'export'=>[//export like view grid --ptr.nov-
            'fontAwesome'=>true,
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK
        ],

    ],
       // 'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],
       // 'containerOptions' => ['style' => 'overflow: auto'],
    //'persistResize'=>true,
        //'responsiveWrap'=>true,
        //'floatHeaderOptions'=>['scrollContainer'=>'25'],

    ]);

//---EMPLOYE RESIGN --
$tab_employe_resign= GridView::widget([
    'id'=>'resign',
    'dataProvider' => $dataProvider1,
    'filterModel' => $searchModel1,
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            //'template' => '{view} {update}',
            //Yii::t('app', 'Emplo'),
        ],
        [
            /*Author -ptr.nov- image*/
            'attribute' => 'PIC',
            'format' => 'html', //'format' => 'image',
            'value'=>function($data){
                    return Html::img(Yii::getAlias('@HRD_EMP_UploadUrl') . '/'. $data->EMP_IMG, ['width'=>'40']);
                },
        ],
        'EMP_ID',
        [
            'attribute' =>'EMP_NM',
        ],

        'EMP_NM_BLK',
        [
            /*Author -ptr.nov-*/
            'attribute' =>'corpOne.CORP_NM',
            'filter' => $Combo_Corp,
            // 'contentOptions'=>['class'=>'kv-sticky-column'],

        ],
        [
            /*Author -ptr.nov-*/
            'attribute' =>'deptOne.DEP_NM',
            'filter' => $Combo_Dept,
        ],
        [
            /*Author -ptr.nov-*/
            'attribute' =>'jabOne.JAB_NM',
            'filter' => $Combo_Jab,
        ],
        [
            /*Author -ptr.nov-*/
            'attribute' =>'sttOne.STS_NM',
            'filter' => $Combo_Status,
        ],
        [
            'attribute' =>'EMP_JOIN_DATE',
            'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
            'filterWidgetOptions' =>([
                    'attribute' =>'EMP_JOIN_DATE',
                    'presetDropdown'=>TRUE,
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'format'=>'Y-m-d',
                        'separator' => ' TO ',
                        'opens'=>'left'
                    ],

                    //'pluginEvents' => [
                    //	"apply.daterangepicker" => "function() { aplicarDateRangeFilter('EMP_JOIN_DATE') }",
                    //]
                ]),

        ],
        [
            'attribute' =>'EMP_RESIGN_DATE',
            'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
            'filterWidgetOptions' =>([
                    'attribute' =>'EMP_RESIGN_DATE',
                    'presetDropdown'=>TRUE,
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'format'=>'Y-m-d',
                        'separator' => ' TO ',
                        'opens'=>'left'
                    ],

                    //'pluginEvents' => [
                    //	"apply.daterangepicker" => "function() { aplicarDateRangeFilter('EMP_JOIN_DATE') }",
                    //]
                ]),

        ],
        //['class' => 'yii\grid\CheckboxColumn'],
        //['class' => '\kartik\grid\RadioColumn'],
    ],
    'panel'=>[
        //'heading' =>true,// $hdr,//<div class="col-lg-4"><h8>'. $hdr .'</h8></div>',
        'type' =>GridView::TYPE_SUCCESS,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
        //'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add', '#', ['class'=>'btn btn-success']) . ' ' .
        //Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary']) . ' ' .
        //    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete  ', '#', ['class'=>'btn btn-danger'])
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create {modelClass}',
                    ['modelClass' => 'Employe',]),
                ['create'], ['class' => 'btn btn-success']),
    ],
    'pjax'=>true,
    'pjaxSettings'=>[
        'options'=>[
            'enablePushState'=>false,
            'id'=>'resign',
            //'formSelector'=>'ddd',
            //'options'=>[
            //    'id'=>'resign'
            //],
        ],
    ],
    'hover'=>true, //cursor select
    //'responsive'=>true,
    'responsiveWrap'=>true,
    'bordered'=>true,
    'striped'=>'4px',
    'autoXlFormat'=>true,
    'export'=>[//export like view grid --ptr.nov-
        'fontAwesome'=>true,
        'showConfirmAlert'=>false,
        'target'=>GridView::TARGET_BLANK
    ],
    // 'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],
    // 'containerOptions' => ['style' => 'overflow: auto'],
    //'persistResize'=>true,
    //'responsiveWrap'=>true,
    //'floatHeaderOptions'=>['scrollContainer'=>'25'],

]);

?>


<?php
use kartik\rating\StarRating;

use kartik\sortable\Sortable;
// With model & without ActiveForm
	$strRat= StarRating::widget([
		'name' => 'rating_1',
		'pluginOptions' => ['disabled'=>true, 'showClear'=>false]
	]);
/*
	use kartik\sortinput\SortableInput;
	
	//$model = Employe::find();
$sortImg= SortableInput::widget([
    //'model' => $model,
    //'attribute' => 'EMP_IMG',
    'hideInput' => false,
    'delimiter' => '~',
    'items' => [['content' =>$Combo_Corp]]
     
]);
*/

use kartik\affix\Affix;
	$content = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.';
	$items = [[
		'url' => '#sec-1',
		'label' => 'Section 1',
		'icon' => 'play-circle',
		'content' => $content,
		'items' => [
			['url' => '#sec-1-1', 'label' => 'Section 1.1', 'content' => $content],
			['url' => '#sec-1-2', 'label' => 'Section 1.2', 'content' => $content],
			['url' => '#sec-1-3', 'label' => 'Section 1.3', 'content' => $content],
			['url' => '#sec-1-4', 'label' => 'Section 1.4', 'content' => $content],
			['url' => '#sec-1-5', 'label' => 'Section 1.5', 'content' => $content],
		],
	],
	[
		'url' => '#sec-2',
		'label' => 'Section 2',
		'icon' => 'play-circle',
		'content' => $content,
		'items' => [
			['url' => '#sec-2-1', 'label' => 'Section 2.1', 'content' => $content],
			['url' => '#sec-2-2', 'label' => 'Section 2.2', 'content' => $content],
			['url' => '#sec-2-3', 'label' => 'Section 2.3', 'content' => $content],
			['url' => '#sec-2-4', 'label' => 'Section 2.4', 'content' => $content],
			['url' => '#sec-2-5', 'label' => 'Section 2.5', 'content' => $content],
		],
	]];
	$KiriMenu= Affix::widget([
		'items' => $items, 
		'type' => 'menu'
	]);
	
	$affk= Affix::widget([
		'items' => $items, 
		'type' => 'body'
	]);
	
use kartik\alert\Alert;

	$ingatan= Alert::widget([
		'type' => Alert::TYPE_INFO,
		'title' => 'Note',
		'titleOptions' => ['icon' => 'info-sign'],
		'body' => 'This is an informative alert sss'
	]);
	use kartik\alert\AlertBlock;

	$ingatanBlock= AlertBlock::widget([
		'type' => AlertBlock::TYPE_ALERT,
		'useSessionFlash' => true
	]);



	// Usage with ActiveForm and model
	/*echo $form->field($model, 'rating')->widget(StarRating::classname(), [
		'pluginOptions' => ['size'=>'lg']
	]);
	*/

	
	
?>

<?php
	/* echo Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]);
	*/
	$items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employe Active','content'=>$tab_employe,
			//'active'=>true,

		],
		
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employe Resign','content'=>$tab_employe_resign,//$tab_profile,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Test Affix','content'=>$KiriMenu.$affk,//$sortImg,// ,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Alrt','content'=>$strRat,//$sortImg,// ,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> RATING','content'=>$strRat,//$sortImg,// ,
		],

	];



	echo TabsX::widget([
		'items'=>$items,
		'position'=>TabsX::POS_ABOVE,
		//'height'=>'tab-height-xs',
		'bordered'=>true,
		'encodeLabels'=>false,
		//'align'=>TabsX::ALIGN_LEFT,

	]);

?>


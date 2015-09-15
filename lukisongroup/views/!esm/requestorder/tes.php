<?php
use yii\helpers\Html;
use yii\data\ArrayDataProvider;

use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

$dataProvider = new ArrayDataProvider([
    'allModels'=>[
        ['id'=>1, 'name'=>'Book Number 1', 'publish_date'=>'25-Dec-2014'],
        ['id'=>2, 'name'=>'Book Number 2', 'publish_date'=>'02-Jan-2014'],
        ['id'=>3, 'name'=>'Book Number 3', 'publish_date'=>'11-May-2014'],
        ['id'=>4, 'name'=>'Book Number 4', 'publish_date'=>'16-Apr-2014'],
        ['id'=>5, 'name'=>'Book Number 5', 'publish_date'=>'16-Apr-2014'] 
    ]
]);

echo Html::beginForm();
echo TabularForm::widget([
    // your data provider
    'dataProvider'=>$dataProvider,
 
    // formName is mandatory for non active forms
    // you can get all attributes in your controller 
    // using $_POST['kvTabForm']
    'formName'=>'kvTabForm',
    
    // set defaults for rendering your attributes
    'attributeDefaults'=>[
        'type'=>TabularForm::INPUT_TEXT,
    ],
    
    // configure attributes to display
    'attributes'=>[
        'id'=>['label'=>'book_id', 'type'=>TabularForm::INPUT_HIDDEN_STATIC],
        'name'=>['label'=>'Book Name'],
        'publish_date'=>['label'=>'Published On', 'type'=>TabularForm::INPUT_STATIC]
    ],
    
    // configure other gridview settings
    'gridSettings'=>[
        'panel'=>[
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Manage Books</h3>',
            'type'=>GridView::TYPE_PRIMARY,
            'before'=>false,
            'footer'=>false,
            'after'=>Html::button('<i class="glyphicon glyphicon-plus"></i> Add New', ['type'=>'button', 'class'=>'btn btn-success kv-batch-create']) . ' ' . 
                    Html::button('<i class="glyphicon glyphicon-remove"></i> Delete', ['type'=>'button', 'class'=>'btn btn-danger kv-batch-delete']) . ' ' .
                    Html::button('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['type'=>'button', 'class'=>'btn btn-primary kv-batch-save'])
        ]
    ]
]);
echo Html::endForm();

?>
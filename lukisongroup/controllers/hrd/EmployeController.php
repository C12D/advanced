<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace lukisongroup\controllers\hrd;

/* VARIABLE BASE YII2 Author: -YII2- */
	use Yii;
	use yii\web\Controller;
	use yii\web\NotFoundHttpException;
	use yii\filters\VerbFilter;

/* VARIABLE PRIMARY JOIN/SEARCH/FILTER/SORT Author: -ptr.nov- */
	use lukisongroup\models\hrd\Employe;			/* TABLE CLASS JOIN */
	use lukisongroup\models\hrd\EmployeSearch;	/* TABLE CLASS SEARCH */
    use yii\helpers\Json;

/* VARIABLE SIDE MENU Author: -Eka- */
	//use lukisongroup\models\system\side_menu\M1000;			/* TABLE CLASS */
	//use lukisongroup\models\system\side_menu\M1000Search;	/* TABLE CLASS SEARCH */
/* CLASS SIDE MENU Author: -ptr.nov- */
	use yii\web\UploadedFile;
	
/**
 * HRD | CONTROLLER EMPLOYE .
 */
class EmployeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(['Employe','Pendidikan']),
                'actions' => [
                    //'delete' => ['post'],
					'save' => ['post'],
                ],
            ],
        ];
    }

    /**
     * ACTION INDEX
     */
    public function actionIndex()
    {
		/*	variable content View Side Menu Author: -Eka- */
		//set menu side menu index - Array Jeson Decode
       // $side_menu=M1000::find()->findMenu('sss_berita_acara')->one()->jval;
        //$side_menu=json_decode($side_menu,true);

		/*	variable content View Employe Author: -ptr.nov- */
        $searchModel = new EmployeSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		 
		/*	variable content View Additional Author: -ptr.nov- */ 
		//$searchFilter = $searchModel->searchALL(Yii::$app->request->queryParams);
        $searchModel1 = new EmployeSearch();
        $dataProvider1 = $searchModel->search_resign(Yii::$app->request->queryParams);
		
		/*SHOW ARRAY YII Author: -Devandro-*/
		//print_r($dataProvider->getModels());
		
		/*SHOW ARRAY JESON Author: -ptr.nov-*/
		//echo  \yii\helpers\Json::encode($dataProvider->getModels());
        if (Yii::$app->request->post('hasEditable')) {
            // instantiate your book model for saving
            $EMP_ID = Yii::$app->request->post('editableKey');
            $model = Employe::findOne($EMP_ID);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // fetch the first entry in posted data (there should
            // only be one entry anyway in this array for an
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $post = [];
            $posted = current($_POST['Employe']);
            $post['Employe'] = $posted;

            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model
                $model->save();

                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';

                // specific use case where you need to validate a specific
                // editable column posted when you have more than one
                // EditableColumn in the grid view. We evaluate here a
                // check to see if buy_amount was posted for the Book model
                if (isset($posted['EMP_NM'])) {
                   // $output =  Yii::$app->formatter->asDecimal($model->EMP_NM, 2);
                    $output =$model->EMP_NM;
                }

                // similarly you can check if the name attribute was posted as well
                // if (isset($posted['name'])) {
                //   $output =  ''; // process as you need
                // }
                $out = Json::encode(['output'=>$output, 'message'=>'']);
            }
            // return ajax json encoded response and exit
            echo $out;
            return;
        }
		return $this->render('index', [
			//'side_menu'=>$side_menu,			/* Content variable Array -SideMenu- */
            'searchModel' => $searchModel, 		/* Content variable Array -Filter Search- */
            'dataProvider' => $dataProvider,	/* Content variable Array -Class Table Join- */
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,  /* Content variable Array Aditional -Class Table Join- */
        ]);
    }

    /**
	 * ACTION VIEW -> $id=PrimaryKey
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);;
		if ($model->load(Yii::$app->request->post())){
			$upload_file=$model->uploadFile();
			var_dump($model->validate());
			if($model->validate()){
				if($model->save()) {
					if ($upload_file !== false) {
						$path=$model->getUploadedFile();
						$upload_file->saveAs($path);
					}
					return $this->redirect(['view', 'id' => $model->EMP_ID]);	
				} 
			}
		}else {
            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    /**
     * ACTION CREATE note | $id=PrimaryKey -> TRIGER FROM VIEW  -ptr.nov-
     */
    public function actionCreate()
    {		
        $model = new Employe();

        if ($model->load(Yii::$app->request->post())){
			$upload_file=$model->uploadFile();
			var_dump($model->validate());
			if($model->validate()){
				if($model->save()) {
					if ($upload_file !== false) {
						$path=$model->getUploadedFile();
						$upload_file->saveAs($path);
					}
					return $this->redirect(['view', 'id' => $model->EMP_ID]);	
				} 
			}
		}else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * ACTION UPDATE -> $id=PrimaryKey
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->EMP_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * ACTION DELETE -> $id=PrimaryKey | CHANGE STATUS -> lihat Standart table status | Jangan dihapus dari record
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * CLASS TABLE FIND PrimaryKey
     * Example:  Employe::find()
     */
    protected function findModel($id)
    {
        if (($model = Employe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionEditableDemo() {
        $model = new Employe; // your model can be loaded here

        // Check if there is an Editable ajax request
        if (isset($_POST['hasEditable'])) {
            // use Yii's response format to encode output as JSON
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            // read your posted model attributes
            if ($model->load($_POST)) {
                // read or convert your posted information
                $value = $model->EMP_NM;

                // return JSON encoded output in the below format
                return ['output'=>$value, 'message'=>''];

                // alternatively you can return a validation error
                // return ['output'=>'', 'message'=>'Validation error'];
            }
            // else if nothing to do always return an empty JSON encoded output
            else {
                return ['output'=>'', 'message'=>''];
            }
        }

        // Else return to rendering a normal view
        //return $this->render('view', ['model'=>$model]);
    }
	
}

<?php

namespace lukisongroup\controllers\esm;

use Yii;
use app\models\esm\ro\Requestorder;
use app\models\esm\ro\RequestorderSearch;
use app\models\esm\ro\Roatribute;

use app\models\esm\ro\Rodetail;
use app\models\esm\ro\RodetailSearch;

use app\models\hrd\Employe;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestorderController implements the CRUD actions for Requestorder model.
 */
class RequestorderController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Requestorder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestorderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		print_r($dataProvider);
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTes()
    {
        return $this->render('tes');
    }

    /**
     * Displays a single Requestorder model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
    /**
     * Creates a new Requestorder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   
    public function actionCreate()
    {
        $model = new Requestorder();
        $reqorder = new Roatribute();
        $rodetail = new Rodetail();
		
		$empId = Yii::$app->user->identity->EMP_ID;
		$dt = Employe::find()->where(['EMP_ID'=>$empId])->all();
		var_dump($dt);

//			------------ TAHUN.BULAN.TANGGAL.RO.NO URUT (4DIGIT)   == > 2015.06.30.RO.0001				
		$qwe = Requestorder::find()->select('ID')->orderBy(['ID' => SORT_DESC])->limit(1)->all();
		
		$nKD = $qwe[0]['ID'] +1;
		$pnjg = strlen($nKD);
		if($pnjg == 1){ $kd = "000".$nKD; }
		else if($pnjg == 2){ $kd = "00".$nKD; }
		else if($pnjg == 3){ $kd = "0".$nKD; }
		else if($pnjg >= 4 ){ $kd = $nKD; }
		
		$kode = date('Y.m.d').'.RO.'.$kd;
//		echo $kode;
		
		$model->KD_RO = $kode;
		$model->ID_USER = $empId;
		$model->KD_DEP = $dt[0]['DEP_ID'];
		$model->KD_CORP = $dt[0]['EMP_CORP_ID'];
		$model->CREATED_AT = date("Y-m-d H:i:s");
		$model->save();
		
		return $this->redirect(['buatro','id'=>$kode]);
		
    }
	
	public function actionBuatro()
    {
        $model = new Requestorder();
        $reqorder = new Roatribute();
        $rodetail = new Rodetail();

		return $this->render('create', [
			'model' => $model,
			'reqorder' => $reqorder,
			'rodetail' => $rodetail,
		]);
    }
	
    public function actionSimpan($id)
    {
        $rodetail = new Rodetail();
		$hsl = $rodetail->load(Yii::$app->request->post());
		$rodetail->save();
	///	var_dump($hsl);
		
		return $this->redirect(['buatro','id'=>$id]);
	//	print_r($this->findModel($id));
//	$myModels = $rodetail->findModel($id);
		
//		$model->KD_RO = 'fg78';
//		$model->save();
		/*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'reqorder' => $reqorder,
                'rodetail' => $rodetail,
            ]);
        }
		*/
		
    }
	
	/*
    public function actionSimpan()
    {
        $model = new Requestorder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
*/
    /**
     * Updates an existing Requestorder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	
    public function actionHapusro($id)
    {
		Rodetail::findModel($id)->delete();
//        $this->findModel($id)->delete();

        return $this->redirect(['buatro','id'=>$id]);
    }

    /**
     * Deletes an existing Requestorder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Requestorder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Requestorder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Requestorder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

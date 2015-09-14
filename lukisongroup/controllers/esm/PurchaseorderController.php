<?php

namespace lukisongroup\controllers\esm;

use Yii;
use lukisongroup\models\esm\po\Purchaseorder;
use lukisongroup\models\esm\po\PurchaseorderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use lukisongroup\models\esm\ro\Requestorder;
use lukisongroup\models\esm\ro\RequestorderSearch;

use lukisongroup\models\esm\ro\Rodetail;
use lukisongroup\models\esm\ro\RodetailSearch;
/**
 * PurchaseorderController implements the CRUD actions for Purchaseorder model.
 */
class PurchaseorderController extends Controller
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
     * Lists all Purchaseorder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PurchaseorderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Purchaseorder();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Purchaseorder model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
    public function actionSimpan()
    {
//		var_dump($_POST);
		$tes = Yii::$app->request->post();
//		print_r($tes);
		$ttl = count($tes['selection']);
		for($a=0; $a<$ttl; $a++){
			echo $tes['selection'][$a].'<br/>';
		}
    }

    /**
     * Creates a new Purchaseorder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Purchaseorder();
		$que = Requestorder::find()->where('STATUS <> 3')->all();  
		
		
        $searchModel = new RequestorderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		return $this->render('create', [
			'model' => $model,
			'que' => $que,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
		]);
		/*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
		*/
    }
	
public function actionDetail($kd_ro,$ids)
{
    $searchModel = new RodetailSearch([
        'KD_RO' => $kd_ro  // Tambahkan ini
    ]);
	
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
    return $this->renderAjax('_detail', [  // ubah ini
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'ids' => $ids,
    ]);
}
    /**
     * Updates an existing Purchaseorder model.
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

    /**
     * Deletes an existing Purchaseorder model.
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
     * Finds the Purchaseorder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Purchaseorder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Purchaseorder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

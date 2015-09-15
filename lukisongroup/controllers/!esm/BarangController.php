<?php

namespace lukisongroup\controllers\esm;

use Yii;
use app\models\esm\Unitbarang;
use app\models\esm\Barang;
use app\models\esm\BarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BarangController implements the CRUD actions for Barang model.
 */
class BarangController extends Controller
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
     * Lists all Barang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BarangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	
	
		$querys = Barang::find()->from('dbc002.b0001 AS db1')->leftJoin('dbm000.b1001 AS db2', 'db1.KD_BARANG = db2.KD_TYPE')->where(['NM_TYPE' => 'FDSFDG'])->all();
		
		
		
/*	
	var_dump($querys);
		
		
		$query= new Query;
		$query->select('*')
				->from('dbc002.b0001 AS db1')
				->leftJoin('dbm000.b1001 AS db2', 'db1.KD_BARANG = db2.KD_TYPE')  
				->where(['db2.NM_TYPE' =>'FDSFDG']);
		$command = $query->createCommand();
		$resp = $command->queryAll();
	*/
	/*
	select * 
from dbc002.b0001 AS db1 
LEFT JOIN dbm000.b1001 AS db2
on db1.KD_BARANG = db2.KD_TYPE
WHERE db2.NM_TYPE = 'FDSFDG'
	
		$querys = Barang::find()->with('tbesm')->where(['tbesm.NM_TYPE' => 'FDSFDG'])->asArray()->all();
		*/
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'querys' => $querys,
        ]);
    }

    /**
     * Displays a single Barang model.
     * @param string $ID
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Barang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Barang();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Barang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ID
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
     * Deletes an existing Barang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ID
     * @return mixed
     */
    public function actionDelete($ID)
    {
        $this->findModel($ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Barang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ID
     * @return Barang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Barang::findOne($ID)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

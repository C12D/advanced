<?php

namespace lukisongroup\controllers\master;

use Yii;
use app\models\master\Suplier;
use app\models\master\SuplierSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SuplierController implements the CRUD actions for Suplier model.
 */
class SuplierController extends Controller
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
     * Lists all Suplier models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuplierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Suplier model.
     * @param string $id
     * @param string $kd_supplier
     * @return mixed
     */
    public function actionView($ID, $KD_SUPPLIER)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $KD_SUPPLIER),
        ]);
    }

    /**
     * Creates a new Suplier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Suplier();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'KD_SUPPLIER' => $model->KD_SUPPLIER]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Suplier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param string $kd_supplier
     * @return mixed
     */
    public function actionUpdate($ID, $KD_SUPPLIER)
    {
        $model = $this->findModel($ID, $KD_SUPPLIER);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'KD_SUPPLIER' => $model->KD_SUPPLIER]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Suplier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param string $kd_supplier
     * @return mixed
     */
    public function actionDelete($ID, $KD_SUPPLIER)
    {
        $this->findModel($ID, $KD_SUPPLIER)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Suplier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param string $kd_supplier
     * @return Suplier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $KD_SUPPLIER)
    {
        if (($model = Suplier::findOne(['ID' => $ID, 'KD_SUPPLIER' => $KD_SUPPLIER])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

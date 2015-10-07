<?php

namespace lukisongroup\controllers\hrd;

use Yii;
use lukisongroup\models\hrd\Jobgrade;
use lukisongroup\models\hrd\JobgradeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JobgradeController implements the CRUD actions for Jobgrade model.
 */
class JobgradeController extends Controller
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
     * Lists all Jobgrade models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JobgradeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jobgrade model.
     * @param integer $ID
     * @param string $JOBGRADE_ID
     * @return mixed
     */
    public function actionView($ID, $JOBGRADE_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $JOBGRADE_ID),
        ]);
    }

    /**
     * Creates a new Jobgrade model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jobgrade();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'JOBGRADE_ID' => $model->JOBGRADE_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jobgrade model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param string $JOBGRADE_ID
     * @return mixed
     */
    public function actionUpdate($ID, $JOBGRADE_ID)
    {
        $model = $this->findModel($ID, $JOBGRADE_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'JOBGRADE_ID' => $model->JOBGRADE_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jobgrade model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param string $JOBGRADE_ID
     * @return mixed
     */
    public function actionDelete($ID, $JOBGRADE_ID)
    {
        $this->findModel($ID, $JOBGRADE_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jobgrade model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param string $JOBGRADE_ID
     * @return Jobgrade the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $JOBGRADE_ID)
    {
        if (($model = Jobgrade::findOne(['ID' => $ID, 'JOBGRADE_ID' => $JOBGRADE_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

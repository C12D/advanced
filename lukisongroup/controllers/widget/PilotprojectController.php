<?php

namespace lukisongroup\controllers\widget;

use Yii;
use lukisongroup\models\widget\Pilotproject;
use lukisongroup\models\widget\PilotprojectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PilotprojectController implements the CRUD actions for Pilotproject model.
 */
class PilotprojectController extends Controller
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
     * Lists all Pilotproject models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PilotprojectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pilotproject model.
     * @param string $id
     * @return mixed
     */
    public function actionView($ID,$PILOT_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID,$PILOT_ID),
        ]);
    }

    /**
     * Creates a new Pilotproject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pilotproject();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pilotproject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($ID,$PILOT_ID)
    {
        $model = $this->findModel($ID,$PILOT_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pilotproject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($ID,$PILOT_ID)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pilotproject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pilotproject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID,$PILOT_ID)
    {
        if (($model = Pilotproject::findOne(['ID'=>$ID,'PILOT_ID'=>$PILOT_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

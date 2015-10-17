<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace lukisongroup\controllers\dashboard\alg;

/* VARIABLE BASE YII2 Author: -YII2- */
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter; 	
use yii\helpers\Html;
use yii\helpers\Url;
use zyx\phpmailer\Mailer;
use yii\widgets\ActiveForm;
use yii\base\DynamicModel;
/* VARIABLE PRIMARY JOIN/SEARCH/FILTER/SORT Author: -ptr.nov- */
//use app\models\hrd\Dept;			/* TABLE CLASS JOIN */
//use app\models\hrd\DeptSearch;		/* TABLE CLASS SEARCH */
	
/**
 * HRD | CONTROLLER EMPLOYE .
 *
 */
class MarketingController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(['prodak']),
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
		/*	variable content View Employe Author: -ptr.nov- 
       // $searchModel_Dept = new DeptSearch();
		//$dataProvider_Dept = $searchModel_Dept->search(Yii::$app->request->queryParams);
		Yii::$app->Mailer->compose()
		->setFrom('lg-postman@lukison.com')
		->setTo('piter@lukison.com')
		->setSubject('Message subject')
		->setTextBody('Plain text content')
		//->setHtmlBody('<b>HTML content</b>')
		->send();
		//return $this->render('index');
		*/
		
		$form = ActiveForm::begin();
		$model = new DynamicModel([
			'TextBody', 'Subject'
		]);
		 $model->addRule(['TextBody', 'Subject'], 'required');
		$ok='Test LG ERP FROM HOME .... GOOD NIGHT ALL, SEE U LATER ';
		
		 $form->field($model, 'Subject')->textInput();
		  ActiveForm::end(); 
		  Yii::$app->mailer->compose()
		 ->setFrom(['postman@lukison.com' => 'LG-ERP-POSTMAN'])
		 //->setTo(['piter@lukison.com'])
		 ->setTo(['it-dept@lukison.com'])
		 ->setSubject('ERP TEST EMAIL')
		 ->setTextBody($ok)
		 ->send();
		 
		
    }
	
	public function actionChat()
    {
        //$model = new LoginForm();
		//$this->sideMenu = 'alg_purchasing';
		//$model = Employe::findOne('LG.2015.0000');
		//$js='$("#chating").modal("show")';
		//$this->getView()->registerJs($js);
		return $this->render('/widget/chat/index',[
			//'model' => $model,
			'ctrl_chat'=>'alg_marketing',
		]);
       
    }
}

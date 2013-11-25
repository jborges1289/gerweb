<?php

class RiesgoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
            
            $oDBC = new CDbCriteria();
$oDBC->select = 't.*,p.*'; 
$oDBC->join = 'LEFT JOIN usuario_rol p ON t.id_usuario = p.usuario_id'; 
$oDBC->condition = 'p.rol_id = 2 ';

$admon_proy = Usuario::model()->findAll($oDBC);

$usuario=array();

foreach ($admon_proy as $value) {
    
  $rol__= $value->usuario;
  $usuario[] = $rol__;
 
}         

            
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','lineaCorte','editarLinea'),
				'users'=>$usuario,
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Riesgo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Riesgo']))
		{
			$model->attributes=$_POST['Riesgo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_riesgo));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Riesgo'])){
			$model->attributes=$_POST['Riesgo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_riesgo));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Riesgo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Riesgo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Riesgo']))
			$model->attributes=$_GET['Riesgo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

        /*
         * Retorna todos los riesgos de un proyecto para designar la linea de corte
         */
        
        public function actionLineaCorte(){
            $idProyecto=$_GET['proyecto'];
            $idRiesgo=0;
            $existeLineaCorte=false;
            $riesgo=Riesgo::model()->find('id_proyecto=:idProyecto && linea_corte=:corte', array(':idProyecto'=>$idProyecto,':corte'=>1));
            
            if(!empty($riesgo)){
                $existeLineaCorte=true;
                $idRiesgo=$riesgo->id_riesgo;
            }
            $riesgoProyecto= Riesgo::model()->findAll('id_proyecto=:idProyecto ORDER BY probabilidad DESC',array('idProyecto'=>$idProyecto));
            $proyecto= Proyecto::model()->findByPk($idProyecto);
            $this->render('lineaCorte',array(
			'riesgos'=>$riesgoProyecto,
                        'existeLineaCorte'=>$existeLineaCorte,
                        'proyecto'=>$proyecto,
                        'idRiesgo'=>$idRiesgo,
		));
            
        }
        
        public function actionEditarLinea(){
            $idRiesgoCorte=  Yii::app()->request->getPost('idRiesgo');
            $idRiesgoNCorte=  Yii::app()->request->getPost('C_Riesgos');
            if($idRiesgoCorte!=0){
                $riesgoCorte= $this->loadModel($idRiesgoCorte);
                $riesgoCorte->setAttribute('linea_corte', false);
                $riesgoCorte->update();
                $riesgoNCorte=  $riesgoNCorte= $this->loadModel($idRiesgoNCorte);
                $riesgoNCorte->setAttribute('linea_corte', true);
                $riesgoNCorte->update();
                $this->redirect(array('riesgo/lineaCorte','proyecto'=>$riesgoCorte->id_proyecto));
            }else{
                $riesgoNCorte= $this->loadModel($idRiesgoNCorte);
                $riesgoNCorte->setAttribute('linea_corte', true);
                $riesgoNCorte->update();
                $this->redirect(array('riesgo/lineaCorte','proyecto'=>$riesgoNCorte->id_proyecto));
            }
            
            
            
        }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Riesgo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Riesgo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Riesgo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='riesgo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

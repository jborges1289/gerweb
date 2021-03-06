<?php

class RiesgoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {


        $sql = new CDbCriteria();
        $sql->select = 't.*,p.*';
        $sql->join = 'LEFT JOIN usuario_rol p ON t.id_usuario = p.usuario_id';
        $sql->condition = 'p.rol_id = 1';

        $admin_proy = Usuario::model()->findAll($sql);

        $usuariosAdminProy= array();

        foreach ($admin_proy as $value) {

            $rol__ = $value->usuario;
            $usuariosAdminProy[] = $rol__;
        }



        $oDBC = new CDbCriteria();
        $oDBC->select = 't.*,p.*';
        $oDBC->join = 'LEFT JOIN usuario_rol p ON t.id_usuario = p.usuario_id';
        $oDBC->condition = 'p.rol_id = 2';

        $admon_ries = Usuario::model()->findAll($oDBC);

        $usuariosAdminRiesgo = array();

        foreach ($admon_ries as $value) {

            $rol__ = $value->usuario;
            $usuariosAdminRiesgo[] = $rol__;
        }


        $query = new CDbCriteria();
        $query->select = 't.*,p.*';
        $query->join = 'LEFT JOIN usuario_rol p ON t.id_usuario = p.usuario_id';
        $query->condition = 'p.rol_id = 3';

        $equip_ries = Usuario::model()->findAll($query);

        $usuariosEquipRiesgo = array();

        foreach ($equip_ries as $value) {

            $rol__ = $value->usuario;
            $usuariosEquipRiesgo[] = $rol__;
        }


        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => $usuariosAdminProy,
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'index', 'view'),
                'users' => $usuariosEquipRiesgo,
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'update', 
                    'admin', 'delete', 'lineaCorte','lineaDeCorte',
                    'editarLinea','index','view','frecuencia'),
                'users' => $usuariosAdminRiesgo,
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Riesgo;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Riesgo'])) {
            $model->attributes = $_POST['Riesgo'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_riesgo));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Riesgo'])) {
            $model->attributes = $_POST['Riesgo'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_riesgo));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        
        $usuario = Yii::app()->user->id;


     $users = Usuario::model()->find(array(
            'select' => 'id_usuario',
            'condition' => 'usuario=:usuario',
            'params' => array(':usuario' => $usuario),
                )
        );
    
        
   $usuario_rol_id = $users->id_usuario;
   
    $userRol = UsuarioRol::model()->find(array(
        'condition' => 'usuario_id=:usuario_id',
        'params' => array(':usuario_id' => $usuario_rol_id),
            )
    );

    
    
    if($userRol->rol_id =='1'){
        
        $model = new Riesgo();
      
       
        $dataProvider = new CActiveDataProvider($model, array(
        
        'criteria'=>array(
        'select' => 't.*, p.*',
        'join' => 'INNER JOIN proyecto p ON t.id_proyecto = p.id_proyecto',    
        'condition'=>'p.administrador = '.$usuario_rol_id.'',
        )
            
           ));
    }elseif ($userRol->rol_id == '2') {
           
        $model = new Riesgo();
   
        $dataProvider = new CActiveDataProvider($model, array(
        
       'criteria'=>array(
        'select' => 't.*, p.*',
        'join' => 'INNER JOIN proyecto p ON t.id_proyecto = p.id_proyecto',    
        'condition'=>'p.admin_riesgo = '.$usuario_rol_id.'',
        )
            
           ));
            
        }else if($userRol->rol_id == '3'){
            
            $id = EquipoRiesgo::model()->find(array(
                
                'select'=>'admin_riesgos',
                'condition' => 'equipo_riesgo ='.$usuario_rol_id.'',
            ));
            
         $id_admin_riesgo = $id->admin_riesgos;

            $model = new Riesgo();
   
        $dataProvider = new CActiveDataProvider($model, array(
        
       'criteria'=>array(
        'select' => 't.*, p.*',
        'join' => 'INNER JOIN proyecto p ON t.id_proyecto = p.id_proyecto',    
        'condition'=>'p.admin_riesgo = '.$id_admin_riesgo.'',
        )
            
           ));
            
        }
        
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Riesgo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Riesgo']))
            $model->attributes = $_GET['Riesgo'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /*
     * Retorna todos los riesgos de un proyecto para designar la linea de corte
     */

    public function actionLineaCorte() {
        
        
         $usuario = Yii::app()->user->id;


        $users = Usuario::model()->find(array(
            'select' => 'id_usuario',
            'condition' => 'usuario=:usuario',
            'params' => array(':usuario' => $usuario),
                )
        );


        $usuario_rol_id = $users->id_usuario;

        $userRol = UsuarioRol::model()->find(array(
            'condition' => 'usuario_id=:usuario_id',
            'params' => array(':usuario_id' => $usuario_rol_id),
                )
        );


        $criteria = new CDbCriteria();

        if ($userRol->rol_id == '2') {
        
        $criteria = new CDbCriteria;
        
          $criteria->select = 't.*,p.*';
          $criteria->join = 'INNER JOIN proyecto p ON t.id_proyecto = p.id_proyecto';
          $criteria->condition ='p.admin_riesgo='.$usuario_rol_id.'';
        
        }
        
        $model = Proyecto::model()->findAll($criteria);
        
        $this->render('proyectosLinea', array('proyectosAsignados'=>$model));
        
    }

    public function actionLineaDeCorte(){
        $idProyecto = $_GET['proyecto'];
        $idRiesgo = 0;
        $existeLineaCorte = false;
        $riesgo = Riesgo::model()->find('id_proyecto=:idProyecto && linea_corte=:corte', array(':idProyecto' => $idProyecto, ':corte' => 1));

        if (!empty($riesgo)) {
            $existeLineaCorte = true;
            $idRiesgo = $riesgo->id_riesgo;
        }
        $riesgoProyecto = Riesgo::model()->findAll('id_proyecto=:idProyecto ORDER BY probabilidad DESC', array('idProyecto' => $idProyecto));
        $proyecto = Proyecto::model()->findByPk($idProyecto);
        $this->render('lineaCorte', array(
            'riesgos' => $riesgoProyecto,
            'existeLineaCorte' => $existeLineaCorte,
            'proyecto' => $proyecto,
            'idRiesgo' => $idRiesgo,
        ));
    }
    
    public function actionEditarLinea() {
        $idRiesgoCorte = Yii::app()->request->getPost('idRiesgo');
        $idRiesgoNCorte = Yii::app()->request->getPost('C_Riesgos');
        if ($idRiesgoCorte != 0) {
            $riesgoCorte = $this->loadModel($idRiesgoCorte);
            $riesgoCorte->setAttribute('linea_corte', false);
            $riesgoCorte->update();
            $riesgoNCorte = $riesgoNCorte = $this->loadModel($idRiesgoNCorte);
            $riesgoNCorte->setAttribute('linea_corte', true);
            $riesgoNCorte->update();
            $this->redirect(array('riesgo/lineaDeCorte', 'proyecto' => $riesgoCorte->id_proyecto));
        } else {
            $riesgoNCorte = $this->loadModel($idRiesgoNCorte);
            $riesgoNCorte->setAttribute('linea_corte', true);
            $riesgoNCorte->update();
            $this->redirect(array('riesgo/lineaDeCorte', 'proyecto' => $riesgoNCorte->id_proyecto));
        }
    }

    
    public function actionFrecuencia(){
        $riesgosTecnico=$this->frecuenciaCategoriaRiesgo('tecnico');
        $riesgosNegocio=$this->frecuenciaCategoriaRiesgo('negocio');
        $riesgosProyecto=$this->frecuenciaCategoriaRiesgo('proyecto');
        $this->render('frecuenciaRiesgos', array('tecnico'=>$riesgosTecnico,'negocio'=>$riesgosNegocio,'proyecto'=>$riesgosProyecto));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Riesgo the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Riesgo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Riesgo $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'riesgo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    private function frecuenciaCategoriaRiesgo($categoria){
        //proyecto, tecnico, negocio
        $riesgosCategoria= Riesgo::model()->findAll(array(
            'condition' => 'categoria=:categoria',
            'params' => array(':categoria' => $categoria),
                ));
        $cantidadRiesgo=  count($riesgosCategoria);
        return $cantidadRiesgo;
    }

}

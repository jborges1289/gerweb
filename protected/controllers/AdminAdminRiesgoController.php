<?php

class AdminAdminRiesgoController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */

    public function actionCreate() {

        $idAdminRiesgos = $_GET['idAdmin'];

        $model = new AdminAdminRiesgo();

        $userSession = Yii::app()->user->id;
        $usuario = Usuario::model()->find('usuario=:user', array(':user' => $userSession));

        $model->administrador_riesgo = $idAdminRiesgos;
        $model->administrador= $usuario->id_usuario;



        if ($model->save()) {

            $this->redirect(array('usuario/ver&id=' . $model->administrador_riesgo));
        } else {

            $modelError = Usuario::model()->findAllByAttributes($model->administrador_riesgo);
            $modelError->perfil = $rol;
            $this->render('/usuario/create', array(
                'model' => $modelError,
            ));
        }
    }

}
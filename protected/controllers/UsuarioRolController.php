<?php

class UsuarioRolController extends Controller {

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


        $rol = $_GET['rol'];
        $id = $_GET['id'];
        
        $model = new UsuarioRol();

        $model->usuario_id = $id;
        $model->rol_id = $rol;

        if ($model->save()) {
            
            $this->redirect(array('usuario/ver&id='. $model->usuario_id));
            
        } else {

            $modelError = Usuario::model()->findAllByAttributes($model->usuario_id);
            $modelError->perfil=$rol;
            $this->render('/usuario/create', array(
                'model' => $modelError,
            ));
        }
    }

}

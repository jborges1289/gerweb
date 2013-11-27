<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */

$this->breadcrumbs=array(
	'Riesgos'=>'',
	'Crear Riesgo',
);


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

    
    
     if($userRol->rol_id== '1'){
         
         
         
     }else if($userRol->rol_id=='2'){
         
         $this->menu=array(
         
   
        array('label'=>'Gestionar Riesgo', 'url'=>array('admin')),
	array('label'=>'Listar Riesgo', 'url'=>array('index')),
        array('label'=>'Crear Integrante de Riesgos', 'url'=>array('usuario/create')),
	
);
         
     }else if($userRol->rol_id=='3'){
          $this->menu=array(  array('label'=>'Listar Riesgo', 'url'=>array('index')
             
                 ));
         
     }


?>

<h1>Crear Riesgo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
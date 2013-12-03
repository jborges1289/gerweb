<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */
  $this->pageTitle=Yii::app()->name . ' - Crear Riesgo';
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
         
//        array('label'=>'Crear Riesgo', 'url'=>array('create')),
        array('label'=>'Listar Riesgos', 'url'=>array('index')),
        array('label'=>'Linea de Corte de Riesgos', 'url'=>array('lineaCorte')),
        array('label'=>'Frecuencia de Riesgos', 'url'=>array('riesgo/frecuencia')),
        array(),
        array('label'=>'Crear Integrante de Riesgos', 'url'=>array('usuario/create')),
        array('label'=>'Gestión de Integrantes de Riesgos', 'url'=>array('usuario/admin')),
        array('label'=>'Listar Integrantes de Riesgos', 'url'=>array('usuario/index')),
	
);
         
     }else if($userRol->rol_id=='3'){
//          $this->menu=array(  array('label'=>'Listar Riesgo', 'url'=>array('index')
             
//                 ));
         
     }
?>

<h1>Crear Riesgo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
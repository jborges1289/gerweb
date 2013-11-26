<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */

$this->breadcrumbs=array(
	'Riesgos'=>array('index'),
	$model->id_riesgo=>array('view','id'=>$model->id_riesgo),
	'Actualizar',
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
	array('label'=>'Listar Riesgo', 'url'=>array('index')),
	array('label'=>'Crear Riesgo', 'url'=>array('create')),
	array('label'=>'Ver Riesgo', 'url'=>array('view', 'id'=>$model->id_riesgo)),
	array('label'=>'Gestionar Riesgo', 'url'=>array('admin')),
);
         
     }else if($userRol->rol_id=='3'){
         
         $this->menu=array(
	array('label'=>'Listar Riesgo', 'url'=>array('index')),
	array('label'=>'Crear Riesgo', 'url'=>array('create')),
	array('label'=>'Ver Riesgo', 'url'=>array('view', 'id'=>$model->id_riesgo)),
	
);
         
     }



?>

<h1>Actualizar Riesgo <?php echo $model->id_riesgo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
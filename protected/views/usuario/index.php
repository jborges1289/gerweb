<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios'=>'',
        'Listar Usuarios'
);

$this->menu=array(
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
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
        $this->menu=array(
	array('label'=>'Crear Proyecto', 'url'=>array('proyecto/create')),
        array('label'=>'Listar Proyectos', 'url'=>array('proyecto/index')),    
	array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')), 
           
         
         );
        
     }else if($userRol->rol_id== '2'){
         
         //No tiene acceso a este menu el usuario Administrador de Riesgos
         
     }else if($userRol->rol_id== '3'){
         
         //No tiene acceso a este menu el usuario Equipo de Riesgos
     }

?>

<h1>Listar Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<br>
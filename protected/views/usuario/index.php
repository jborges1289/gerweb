<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */




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
         
          $this->breadcrumbs=array(
	'Usuarios'=>'',
        'Listar Admin de Riesgos',
);
         
     $this->menu=array(
    
        array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Listar Proyectos', 'url'=>array('index')),
        array('label'=>'Crear Admin de Riesgos', 'url'=>array('create')),
        array('label'=>'Gestión Admin de Riesgos', 'url'=>array('admin')),
//	array('label'=>'Listar Admin de Riesgos', 'url'=>array('index')),  
	array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
   
);
        
     echo '<h1>Listar Admin de Riesgos</h1>';
     
     }else if($userRol->rol_id== '2'){
         
         //No tiene acceso a este menu el usuario Administrador de Riesgos
         
     }else if($userRol->rol_id== '3'){
         
         //No tiene acceso a este menu el usuario Equipo de Riesgos
     }

?>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<br>
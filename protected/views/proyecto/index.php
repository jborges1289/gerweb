<?php
/* @var $this ProyectoController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle=Yii::app()->name . ' - Listar Proyectos';
$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Listar Proyectos',
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
    
             
                  array(  
                        'label'=>'Riesgos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
                                 array('label'=>'Crear Proyecto', 'url'=>array('create')),
//                                 array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
                        )
                ),
	
 
              array(  
                        'label'=>'Usuarios', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
                                  array('label'=>'Crear Admin de Riesgos', 'url'=>array('usuario/create')),
                                  array('label'=>'Gestión Admin de Riesgos', 'url'=>array('usuario/admin')),
                                  array('label'=>'Listar Admin de Riesgos', 'url'=>array('usuario/index')),
                        )
                ),
             
         array(  
                        'label'=>'Riesgos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
                                array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
                        )
                ),
     
	
   
);
        
     }else if($userRol->rol_id== '2'){
         
         //No tiene acceso a este menu el usuario Administrador de Riesgos
         
     }else if($userRol->rol_id== '3'){
         
         //No tiene acceso a este menu el usuario Equipo de Riesgos
     }
     
     

       
?>

<h1>Listar Proyectos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));?>

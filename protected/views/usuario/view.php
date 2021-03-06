<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario,
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

$this->pageTitle=Yii::app()->name . ' - Ver Admin de Riesgos';

$this->menu=array(
	 array(
        'label' => 'Proyectos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array( 
        array('label'=>'Crear Proyecto', 'url'=>array('proyecto/create')),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/index')),
        )), 
    
     array(
        'label' => 'Usuarios',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
	array('label'=>'Actualizar Admin de Riesgos', 'url'=>array('update', 'id'=>$model->id_usuario)),
        array('label'=>'Crear Admin de Riesgos', 'url'=>array('usuario/create')),	
        array('label'=>'Eliminar Admin de Riesgos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'¿Está seguro que desea borrar este elemento??')),
//        array('label'=>'Gestión Admin de Riesgos', 'url'=>array('usuario/admin')),  
	)),
    
     array(
        'label' => 'Riesgos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
))
         );

echo '<h1> Admin de Riesgos # '.$model->id_usuario.'</h1>';

   }else if($userRol->rol_id== '2'){
       
       
$this->pageTitle=Yii::app()->name . ' - Ver Integrantes de Riesgos';
       
       $this->menu=array(
	 array(
        'label' => 'Riesgos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
	array('label'=>'Crear Riesgo', 'url'=>array('riesgo/create')),
        array('label'=>'Frecuencia de Riesgos', 'url'=>array('riesgo/frecuencia')),
        array('label'=>'Linea de Corte de Riesgos', 'url'=>array('riesgo/lineaCorte')),
        array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),       
        )),
           
           array(
        'label' => 'Usuarios',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array( 
        array('label'=>'Actualizar Integrante de Riesgos', 'url'=>array('update', 'id'=>$model->id_usuario)),   
        array('label'=>'Crear Integrante de Riesgos', 'url'=>array('usuario/create')),
        array('label'=>'Eliminar Integrante de Riesgos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'¿Está seguro que desea eliminar a este Integrante?')),
//        array('label'=>'Gestión de Integrantes de Riesgos', 'url'=>array('usuario/admin')),
        array('label'=>'Listar Integrantes de Riesgos', 'url'=>array('usuario/index')),
))
               );
       
echo '<h1> Integrantes de Riesgos #'.$model->id_usuario.'</h1>';

   }
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuario',
		'usuario',
		'contrasena',
		'nombres',
		'primer_apellido',
		'segundo_apellido',
	),
)); 
?>
<?php
echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));
?>

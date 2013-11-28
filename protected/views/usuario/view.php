<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario,
);

$this->menu=array(
	 
        array('label'=>'Crear Proyecto', 'url'=>array('proyecto/create')),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/index')),
        array(''=>'','url'=>array('#')), 
	array('label'=>'Actualizar Admin de Riesgos', 'url'=>array('update', 'id'=>$model->id_usuario)),
        array('label'=>'Crear Admin de Riesgos', 'url'=>array('usuario/create')),	
        array('label'=>'Eliminar Admin de Riesgos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'¿Está seguro que desea borrar este elemento??')),
//        array('label'=>'Gestión Admin de Riesgos', 'url'=>array('usuario/admin')),  
	array(''=>'','url'=>array('#')), 
        array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
);
?>

<h1>Usuario #<?php echo $model->id_usuario; ?></h1>

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

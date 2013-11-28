<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Update',
);

$this->menu=array(
	
//	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->id_usuario)),
//	array('label'=>'Manage Usuario', 'url'=>array('admin')),
//    
        array('label'=>'Crear Proyecto', 'url'=>array('proyecto/create')),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/index')),
        array(''=>'','url'=>array('#')), 
        array('label'=>'Crear Admin de Riesgos', 'url'=>array('create')),
        array('label'=>'Eliminar Admin de Riesgos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>'Gestión Admin de Riesgos', 'url'=>array('usuario/admin')),
//	array('label'=>'Listar Admin de Riesgos', 'url'=>array('index')),  
        array(''=>'','url'=>array('#')), 
	array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
    
);
?>

<h1>Actualizar Usuario <?php echo $model->id_usuario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
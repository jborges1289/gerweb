<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->id_proyecto,
);

$this->menu=array(
	array('label'=>'List Proyecto', 'url'=>array('index')),
	array('label'=>'Create Proyecto', 'url'=>array('create')),
	array('label'=>'Update Proyecto', 'url'=>array('update', 'id'=>$model->id_proyecto)),
	array('label'=>'Delete Proyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_proyecto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Proyecto', 'url'=>array('admin')),
);
?>

<h1>View Proyecto #<?php echo $model->id_proyecto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_proyecto',
		'titulo',
		'descripcion',
		'tipo_proyecto',
		'fecha_inicio',
		'fecha_fin',
		'administrador',
		'admin_riesgo',
	),
)); ?>

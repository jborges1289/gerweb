<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->id_proyecto=>array('view','id'=>$model->id_proyecto),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Proyecto', 'url'=>array('index')),
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Ver Proyecto', 'url'=>array('view', 'id'=>$model->id_proyecto)),
	array('label'=>'Addministrar Proyecto', 'url'=>array('admin')),
);
?>

<h1>Update Proyecto <?php echo $model->id_proyecto; ?></h1>

<?php $this->renderPartial('_formRegister', array('model'=>$model)); ?>
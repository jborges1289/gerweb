<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar Proyectos', 'url'=>array('admin')),
);
?>

<h1>Crea Proyecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
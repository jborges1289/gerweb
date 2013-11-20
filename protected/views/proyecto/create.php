<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Crear Proyectos',
);

$this->menu=array(
	array('label'=>'Gestión de Proyectos', 'url'=>array('admin')),
);
?>

<h1>Crear Proyecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
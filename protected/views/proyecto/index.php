<?php
/* @var $this ProyectoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Listar Proyectos',
);

$this->menu=array(
	array('label'=>'Crear Proyectos', 'url'=>array('create')),
	array('label'=>'Gestión de Proyectos', 'url'=>array('admin')),
);
?>

<h1>Listar Proyectos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

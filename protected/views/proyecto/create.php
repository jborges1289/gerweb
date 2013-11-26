<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Crear Proyectos',
);

$this->menu=array(
	array('label'=>'Listar Proyectos', 'url'=>array('index')),
        array('label'=>'Gestión de Proyectos', 'url'=>array('admin')),
        array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
        array('label'=>'Listar Usuarios', 'url'=>array('usuario/index')),
);
?>

<h1>Crear Proyecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
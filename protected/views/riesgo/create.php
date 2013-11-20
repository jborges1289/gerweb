<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */

$this->breadcrumbs=array(
	'Riesgos'=>'',
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Riesgo', 'url'=>array('index')),
	array('label'=>'Gestionar Riesgo', 'url'=>array('admin')),
);
?>

<h1>Crear Riesgo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */

$this->breadcrumbs=array(
	'Riesgos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Riesgo', 'url'=>array('index')),
	array('label'=>'Manage Riesgo', 'url'=>array('admin')),
);
?>

<h1>Create Riesgo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
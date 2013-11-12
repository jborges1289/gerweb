<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */

$this->breadcrumbs=array(
	'Riesgos'=>array('index'),
	$model->id_riesgo,
);

$this->menu=array(
	array('label'=>'List Riesgo', 'url'=>array('index')),
	array('label'=>'Create Riesgo', 'url'=>array('create')),
	array('label'=>'Update Riesgo', 'url'=>array('update', 'id'=>$model->id_riesgo)),
	array('label'=>'Delete Riesgo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_riesgo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Riesgo', 'url'=>array('admin')),
);
?>

<h1>View Riesgo #<?php echo $model->id_riesgo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_riesgo',
		'nombre',
		'categoria',
		'tipo',
		'probabilidad',
		'impacto',
		'fecha',
		'descripcion',
		'factores_influyen',
		'reduccion',
		'plan_contigencia',
		'redactor',
		'responsable',
	),
)); ?>

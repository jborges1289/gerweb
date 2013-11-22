<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */

$this->breadcrumbs=array(
	'Riesgos'=>array('index'),
	$model->id_riesgo,
);

$this->menu=array(
	array('label'=>'Listar Riesgo', 'url'=>array('index')),
	array('label'=>'Crear Riesgo', 'url'=>array('create')),
	array('label'=>'Actualizar Riesgo', 'url'=>array('update', 'id'=>$model->id_riesgo)),
	array('label'=>'Eliminar Riesgo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_riesgo),'confirm'=>'Seguro desea eliminar este riesgo?')),
	array('label'=>'Gestionar Riesgo', 'url'=>array('admin')),
);
?>

<h1>Ver Riesgo #<?php echo $model->id_riesgo; ?></h1>

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
                'id_proyecto',
		'linea_corte',
	),
)); ?>

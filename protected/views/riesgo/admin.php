<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */

$this->breadcrumbs=array(
	'Riesgos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Riesgo', 'url'=>array('index')),
	array('label'=>'Create Riesgo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#riesgo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion de Riesgos</h1>

<p>
También puede escribir un operador de comparación(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al comienzo de cada uno de sus valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'riesgo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_riesgo',
		'nombre',
		'categoria',
		'tipo',
		'probabilidad',
		'impacto',
		/*
		'fecha',
		'descripcion',
		'factores_influyen',
		'reduccion',
		'plan_contigencia',
		'redactor',
		'responsable',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

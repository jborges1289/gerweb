<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Proyecto'=>array('index'),
	'Gestion de Riesgos',
);

$this->menu=array(
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Crear Usuario', 'url'=>array('usuario/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión de Riesgos</h1>

<p>
También puede escribir un operador de comparación (<b> << / b>, <b> <= </ b>, <b>> </ b>, <b>> = </ b>, <b> <> </ b>
o <b> = </ b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_proyecto',
		'titulo',
		'descripcion',
		'tipo_proyecto',
		'fecha_inicio',
		'fecha_fin',
		'administrador',
		'admin_riesgo',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

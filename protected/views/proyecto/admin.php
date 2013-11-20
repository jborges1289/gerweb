<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Gestión de Proyectos',
);

$this->menu=array(
	array('label'=>'Listar Proyectos', 'url'=>array('index')),
	array('label'=>'Crear Proyectos', 'url'=>array('create')),
        array('label'=>'Listar Usuarios', 'url'=>array('usuario/index')),
        array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#proyecto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión de Proyectos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proyecto-grid',
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

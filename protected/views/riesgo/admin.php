<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */

$this->breadcrumbs=array(
	'Riesgos'=>array('index'),
	'Gestión de Riesgos',
);



$usuario = Yii::app()->user->id;


     $users = Usuario::model()->find(array(
            'select' => 'id_usuario',
            'condition' => 'usuario=:usuario',
            'params' => array(':usuario' => $usuario),
                )
        );
    
        
   $usuario_rol_id = $users->id_usuario;
   
    $userRol = UsuarioRol::model()->find(array(
        'condition' => 'usuario_id=:usuario_id',
        'params' => array(':usuario_id' => $usuario_rol_id),
            )
    );



   if($usuario_rol_id== '1'){}

$this->menu=array(
	
	
        array('label'=>'Listar Riesgo', 'url'=>array('index')),
        array('label'=>'Crear Riesgo', 'url'=>array('create')),
        array('label'=>'Crear Usuario', 'url'=>array('usuario/create')),
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

<h1>Gestión de Riesgos</h1>

<p>
También puede escribir un operador de comparación(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al comienzo de cada uno de sus valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
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
                'id_proyecto',
		'linea_corte',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

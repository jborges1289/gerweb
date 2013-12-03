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



   if($userRol->rol_id== '2'){
$this->pageTitle=Yii::app()->name . ' - Gestión de Admin Riesgos';
$this->menu=array(
	
	array('label'=>'Crear Riesgo', 'url'=>array('create')),
        array('label'=>'Linea de Corte de Riesgos', 'url'=>array('lineaCorte')),
        array('label'=>'Listar Riesgos', 'url'=>array('index')),
        array('label'=>'Frecuencia de Riesgos', 'url'=>array('riesgo/frecuencia')),
        
        array(),
        array('label'=>'Crear Integrante de Riesgos', 'url'=>array('usuario/create')),
        array('label'=>'Gestión de Integrantes de Riesgos', 'url'=>array('usuario/admin')),
        array('label'=>'Listar Integrantes de Riesgos', 'url'=>array('usuario/index')),
);
   }
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
o <b>=</b>) al comienzo de cada uno de sus valores de búsqueda para especificar cómo se debe hacer la comparación.
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
)); 
//echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));?>

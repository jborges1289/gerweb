<?php
/* @var $this UsuarioController */
/* @var $model Usuario */




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


<?php if($userRol->rol_id =='1'){
    
    $this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Gestión Admin de Riesgos',
);

   
     $this->menu=array(
    
        array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Listar Proyectos', 'url'=>array('index')),
        array('label'=>'Crear Admin de Riesgos', 'url'=>array('create')),
//        array('label'=>'Gestión Admin de Riesgos', 'url'=>array('usuario/admin')),
	array('label'=>'Listar Admin de Riesgos', 'url'=>array('index')),  
	array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),

        
);
    
    
   echo '<h1>Gestión de Admin de Riesgos</h1>';
   
   
   
    
}else if($userRol->rol_id=='2'){
    
    echo '<h1>Gestión de Equipo de Riesgos</h1>';
    
} ?>




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
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_usuario',
		'usuario',
		'contrasena',
		'nombres',
		'primer_apellido',
		'segundo_apellido',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

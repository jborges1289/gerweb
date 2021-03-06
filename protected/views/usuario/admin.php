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
    $this->pageTitle=Yii::app()->name . ' - Gestión de Admin de Riesgos';
    $this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Gestión Admin de Riesgos',
);

   
     $this->menu=array(
    
            array(
        'label' => 'Proyectos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Crear Proyecto', 'url'=>array('proyecto/create')),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/index')),
      )), 
        
            array(
        'label' => 'Proyectos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
         array('label'=>'Crear Admin de Riesgos', 'url'=>array('create')),
//        array('label'=>'Gestión Admin de Riesgos', 'url'=>array('usuario/admin')),
	array('label'=>'Listar Admin de Riesgos', 'url'=>array('index')),  
      )), 
         
          array(
        'label' => 'Proyectos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(  
	array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
        ))
);
    
    
   echo '<h1>Gestión de Admin de Riesgos</h1>';
   
   
   
    
}else if($userRol->rol_id=='2'){
    
    $this->pageTitle=Yii::app()->name . ' - Gestión de Integrantes de Riesgos';
    $this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Gestión de Integrantes de Riesgos',
);
    
    
    $this->menu=array(
     array(  
                        'label'=>'Riesgos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(    
        array('label'=>'Crear Riesgo', 'url'=>array('riesgo/create')),
        array('label'=>'Frecuencia de Riesgos', 'url'=>array('riesgo/frecuencia')),
        array('label'=>'Linea de Corte de Riesgos', 'url'=>array('riesgo/lineaCorte')),
        array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
    
        )),
        
       array(  
                        'label'=>'Usuarios', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(  
        array('label'=>'Crear Integrante de Riesgos', 'url'=>array('usuario/create')),
//        array('label'=>'Gestión de Integrantes de Riesgos', 'url'=>array('usuario/admin')),
        array('label'=>'Listar Integrantes de Riesgos', 'url'=>array('usuario/index')),
 ))
                            );
    
    
    echo '<h1>Gestión de Integrantes de Riesgos</h1>';
    
} ?>




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
)); 


//if($userRol->rol_id== '1' || $userRol =='2'){
echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));
//}

?>
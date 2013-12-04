<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$this->pageTitle=Yii::app()->name . ' - Crear Proyecto';
$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Crear Proyecto',
);

$this->menu=array(
    
//        array('label'=>'Crear Proyecto', 'url'=>array('create')),
     array(  
                        'label'=>'Proyectos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
//                                array('label'=>'Crear Proyecto', 'url'=>array('create')),
                                array('label'=>'Listar Proyectos', 'url'=>array('index')),
                        )
                ),
     
    
     array(  
                        'label'=>'Usuarios', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
                                   array('label'=>'Crear Admin de Riesgos', 'url'=>array('usuario/create')),
                                   array('label'=>'Gestión Admin de Riesgos', 'url'=>array('usuario/admin')),
                                   array('label'=>'Listar Admin de Riesgos', 'url'=>array('usuario/index')),  
                        )
                ),
    
     
	     array(  
                        'label'=>'Riesgos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
                                 array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
                        )
                ),
	
);
?>

<h1>Crear Proyecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
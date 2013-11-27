<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	'Crear Proyectos',
);

$this->menu=array(
    
//        array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Listar Proyectos', 'url'=>array('index')),
        array('label'=>'Crear Admin de Riesgos', 'url'=>array('usuario/create')),
        array('label'=>'Gestión Admin de Riesgos', 'url'=>array('usuario/admin')),
	array('label'=>'Listar Admin de Riesgos', 'url'=>array('usuario/index')),  
	array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
   
);
?>

<h1>Crear Proyecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
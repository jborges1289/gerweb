<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$this->pageTitle=Yii::app()->name . ' - Actualizar Proyecto';
$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->id_proyecto=>array('view','id'=>$model->id_proyecto),
	'Update',
);

$this->menu=array(
    
    
    
     array(
        'label' => 'Proyectos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
            //        array('label'=>'Actualizar Proyecto', 'url'=>array('update', 'id'=>$model->id_proyecto)),	
	array('label'=>'Crear Proyecto', 'url'=>array('create')),	
	array('label'=>'Eliminar Proyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_proyecto),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Gestión de Proyectos', 'url'=>array('admin')),
        array('label'=>'Listar Proyectos', 'url'=>array('index')),
        )
    ),
     array(
        'label' => 'Usuarios',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(

        array('label'=>'Crear Admin de Riesgos', 'url'=>array('usuario/create')),
        array('label'=>'Gestión Admin de Riesgos', 'url'=>array('usuario/admin')),
	array('label'=>'Listar Admin de Riesgos', 'url'=>array('usuario/index')),  
      )),  
         
       array(
        'label' => 'Riesgos',
        'url'=>'#',   
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(  
         
	array('label'=>'Listar Riesgos', 'url'=>array('riesgo/index')),
)),
         );
?>

<h1>Actualizar Proyecto #<?php echo $model->id_proyecto; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
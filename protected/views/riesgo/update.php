<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */

$this->breadcrumbs=array(
	'Riesgos'=>array('index'),
	$model->id_riesgo=>array('view','id'=>$model->id_riesgo),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Riesgo', 'url'=>array('index')),
	array('label'=>'Crear Riesgo', 'url'=>array('create')),
	array('label'=>'Ver Riesgo', 'url'=>array('view', 'id'=>$model->id_riesgo)),
	array('label'=>'Gestionar Riesgo', 'url'=>array('admin')),
);
?>

<h1>Actualizar Riesgo <?php echo $model->id_riesgo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
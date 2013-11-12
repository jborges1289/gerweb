<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */

$this->breadcrumbs=array(
	'Riesgos'=>array('index'),
	$model->id_riesgo=>array('view','id'=>$model->id_riesgo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Riesgo', 'url'=>array('index')),
	array('label'=>'Create Riesgo', 'url'=>array('create')),
	array('label'=>'View Riesgo', 'url'=>array('view', 'id'=>$model->id_riesgo)),
	array('label'=>'Manage Riesgo', 'url'=>array('admin')),
);
?>

<h1>Update Riesgo <?php echo $model->id_riesgo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
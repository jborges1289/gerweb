<?php
/* @var $this RiesgoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Riesgos',
);

$this->menu=array(
	array('label'=>'Crear Riesgo', 'url'=>array('create')),
	array('label'=>'Gestionar Riesgo', 'url'=>array('admin')),
);
?>

<h1>Riesgos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

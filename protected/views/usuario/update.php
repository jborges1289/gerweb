<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	//$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->id_usuario)),
	array('label'=>'Controlar Usuario', 'url'=>array('admin')),
);
?>

<h1>Actualizar Usuario <?php echo $model->id_usuario; ?></h1>

<?php $this->renderPartial('_formRegister', array('model'=>$model)); ?>
<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);

 $user = Yii::app()->db->createCommand()
    ->select('usuario')
    ->from('usuario')
    ->where('discriminador=:discriminador', array(':discriminador'=>1))
    ->queryRow();

echo '<pre>';

foreach ($user as $value) {
    echo $value;
}

echo '</pre>';

            

?>

<h1>Crear Usuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
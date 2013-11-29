<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$this->pageTitle = Yii::app()->name . ' - Ver Proyecto';
$this->breadcrumbs = array(
    'Proyectos' => array('index'),
    $model->id_proyecto,
);





$this->menu = array(
    array('label' => 'Actualizar Proyecto', 'url' => array('update', 'id' => $model->id_proyecto)),
    array('label' => 'Crear Proyecto', 'url' => array('create')),
    array('label' => 'Eliminar Proyecto', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_proyecto), 'confirm' => 'Are you sure you want to delete this item?')),
    array('' => '', 'url' => array('#')),
//	array('label'=>'Gestión de Proyectos', 'url'=>array('admin')),
//        array('label'=>'Listar Proyectos', 'url'=>array('index')),
    array('label' => 'Crear Admin de Riesgos', 'url' => array('usuario/create')),
    array('label' => 'Gestión Admin de Riesgos', 'url' => array('usuario/admin')),
    array('label' => 'Listar Admin de Riesgos', 'url' => array('usuario/index')),
    array('' => '', 'url' => array('#')),
    array('label' => 'Listar Riesgos', 'url' => array('riesgo/index')),
);
?>

<h1> Proyecto #<?php echo $model->id_proyecto; ?></h1>

<?php
$administrador = Usuario::model()->findByPk($model->administrador);
$admin_riesgos = Usuario::model()->findByPk($model->admin_riesgo);

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id_proyecto',
        'titulo',
        'descripcion',
        'tipo_proyecto',
        'fecha_inicio',
        'fecha_fin',
        array(
            'label' => 'Administrador',
            'value' => $administrador->nombres,
        ),
        array(
            'label' => 'Administrador de Riesgos ',
            'value' => $admin_riesgos->nombres,
        ),
    ),
));
echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px', 'onClick' => 'history.go(-1)'));
?>

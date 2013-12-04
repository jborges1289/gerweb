<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$this->pageTitle = Yii::app()->name . ' - Ver Proyecto';
$this->breadcrumbs = array(
    'Proyectos' => array('index'),
    $model->id_proyecto,
);





$this->menu = array(
    
    
    array(
        'label' => 'Proyectos',
        'url' => '#',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
            array('label' => 'Actualizar Proyecto', 'url' => array('update', 'id' => $model->id_proyecto)),
            array('label' => 'Crear Proyecto', 'url' => array('create')),
            array('label' => 'Eliminar Proyecto', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_proyecto), 'confirm' => '¿Desea eliminar este proyecto?')),
        )
    ),
    
    array(  
                        'label'=>'Usuarios', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
                               
     array('label' => 'Crear Admin de Riesgos', 'url' => array('usuario/create')),
    array('label' => 'Gestión Admin de Riesgos', 'url' => array('usuario/admin')),
    array('label' => 'Listar Admin de Riesgos', 'url' => array('usuario/index')),
                        )
                ),
           
array(  
                        'label'=>'Riesgos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
    array('label' => 'Listar Riesgos', 'url' => array('riesgo/index')),
                             )),
);
?>

<h1> Ver Proyecto #<?php echo $model->id_proyecto; ?></h1>

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

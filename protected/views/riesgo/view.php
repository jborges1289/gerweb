<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */
$this->pageTitle=Yii::app()->name . ' - Ver Riesgo';
$this->breadcrumbs = array(
    'Riesgos' => array('index'),
    $model->id_riesgo,
);




$usuario = Yii::app()->user->id;


$users = Usuario::model()->find(array(
    'select' => 'id_usuario',
    'condition' => 'usuario=:usuario',
    'params' => array(':usuario' => $usuario),
        )
);


$usuario_rol_id = $users->id_usuario;

$userRol = UsuarioRol::model()->find(array(
    'condition' => 'usuario_id=:usuario_id',
    'params' => array(':usuario_id' => $usuario_rol_id),
        )
);



if ($userRol->rol_id == '1') {
    $this->menu = array(
          array(  
                        'label'=>'Proyectos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
        
        array('label' => 'Crear Proyecto', 'url' => array('proyecto/create')),
        array('label' => 'Gestión de Proyectos', 'url' => array('proyecto/admin')),
        array('label' => 'Listar Proyectos', 'url' => array('proyecto/index')),
   )),
        
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
  ))
                            );
} else if ($userRol->rol_id == '2') {
  $this->menu = array(
    array(  
                        'label'=>'Riesgos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
    
        array('label' => 'Actualizar Riesgo', 'url' => array('update', 'id' => $model->id_riesgo)),
        array('label' => 'Crear Riesgo', 'url' => array('create')),
        array('label' => 'Eliminar Riesgo', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_riesgo), 'confirm' => 'Seguro desea eliminar este riesgo?')),
         array('label'=>'Frecuencia de Riesgos', 'url'=>array('riesgo/frecuencia')),
        array('label' => 'Linea de Corte de Riesgos', 'url' => array('lineaCorte')),
//	array('label'=>'Gestionar Riesgo', 'url'=>array('admin')),
        )),
        array(  
                        'label'=>'Usuarios', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
        array('label' => 'Crear Integrante de Riesgos', 'url' => array('usuario/create')),
        array('label' => 'Gestión de Integrantes de Riesgos', 'url' => array('usuario/admin')),
        array('label' => 'Listar Integrantes de Riesgos', 'url' => array('usuario/index')),
  ))
                            );
} else if ($userRol->rol_id == '3') {

    $this->menu = array(
//	  array(  
            array(            'label'=>'Riesgos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
        array('label' => 'Crear Riesgo', 'url' => array('create')),
        array('label' => 'Actualizar Riesgo', 'url' => array('update', 'id' => $model->id_riesgo)),
        array('label'=>'Listar Riesgos', 'url'=>array('index')),
))
                            );
}
?>

<h1>Ver Riesgo #<?php echo $model->id_riesgo; ?></h1>

<?php
$redactor = Usuario::model()->findByPk($model->redactor);
$responsable = Usuario::model()->findByPk($model->responsable);
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id_riesgo',
        'nombre',
        'categoria',
        'tipo',
        'probabilidad',
        'impacto',
        'fecha',
        'descripcion',
        'factores_influyen',
        'reduccion',
        'plan_contigencia',
//        array(
//            'label' => 'Redactor',
//            'value' => $redactor->nombres,
//        ),
//        array(
//            'label' => 'Responsable',
//            'value' => $responsable->nombres,
//        ),
        'idProyecto.titulo',
    //'linea_corte',
    ),
));
?>

<?php echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px', 'onClick' => 'history.go(-1)')); ?>
<?php
/* @var $this RiesgoController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle=Yii::app()->name . ' - Listar Riesgos';
$this->breadcrumbs = array(
    'Riesgos' => '',
    'Listar Riesgos'
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
                                array('label'=>'Crear Proyecto', 'url'=>array('proyecto/create')),
                                array('label'=>'Listar Proyectos', 'url'=>array('proyecto/index')),
                        )
                ),
           
           
            array(  
                        'label'=>'Usuarios', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
                                 array('label'=>'Crear Admin de Riesgos', 'url'=>array('usuario/create')),
                                 array('label'=>'Gestión Admin de Riesgos', 'url'=>array('usuario/admin')),
                                 array('label'=>'Listar Admin de Riesgos', 'url'=>array('usuario/index')),
                        )
                ),
    );
} else if ($userRol->rol_id == '2') {

   $this->menu=array(
	
	   array(  
                        'label'=>'Riesgos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
//        array('label'=>'Listar Riesgo', 'url'=>array('index')),
        array('label'=>'Crear Riesgo', 'url'=>array('create')),
        array('label'=>'Frecuencia de Riesgos', 'url'=>array('riesgo/frecuencia')),
        array('label'=>'Linea de Corte de Riesgos', 'url'=>array('lineaCorte')),
       
        )),
       
          array(  
                        'label'=>'Usuarios', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(
        array('label'=>'Crear Integrante de Riesgos', 'url'=>array('usuario/create')),
        array('label'=>'Gestión de Integrantes de Riesgos', 'url'=>array('usuario/admin')),
        array('label'=>'Listar Integrantes de Riesgos', 'url'=>array('usuario/index')),
))
              
                            );
} else if ($userRol->rol_id == '3') {

    $this->menu = array(
        array(  
                        'label'=>'Riesgos', 
                        'url'=>'#', 
                        'linkOptions '=> array('encode'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                        'itemOptions '=> array('class'=>'dropdown'),
                        'submenuOptions '=> array('class'=>'dropdown-menu'),
                        'items'=>array(   
        array('label' => 'Crear Riesgo', 'url' => array('create')),
//	array('label'=>'Listar Riesgos', 'url'=>array('index')),
    ))
                            );
}
?>

<h1>Listar Riesgos</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
<div>
    <br>
<br>
<?php
if($userRol->rol_id== '1' || $userRol->rol_id =='2'){
echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));
}
?>
</div>
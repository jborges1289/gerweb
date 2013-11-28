<?php
/* @var $this RiesgoController */
/* @var $dataProvider CActiveDataProvider */

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
        array('label' => 'Crear Proyecto', 'url' => array('proyecto/create')),
        array('label' => 'Listar Proyectos', 'url' => array('proyecto/index')),
        array('' => '', 'url' => array('#')),
        array('label' => 'Crear Admin de Riesgos', 'url' => array('usuario/create')),
        array('label' => 'Gestión Admin de Riesgos', 'url' => array('usuario/admin')),
        array('' => '', 'url' => array('#')),
        array('label' => 'Listar Admin de Riesgos', 'url' => array('usuario/index')),
    );
} else if ($userRol->rol_id == '2') {

    $this->menu = array(
        array('label' => 'Crear Riesgo', 'url' => array('create')),
        array('label' => 'Gestionar Riesgo', 'url' => array('admin')),
        array('label' => 'Crear Integrante de Riesgos', 'url' => array('usuario/create')),
    );
} else if ($userRol->rol_id == '3') {

    $this->menu = array(
        array('label' => 'Crear Riesgo', 'url' => array('create')),
//	array('label'=>'Listar Riesgos', 'url'=>array('index')),
    );
}
?>

<h1>Riesgos</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
<br>
<div>
<?php
echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px', 'onClick' => 'history.go(-1)'));
?>
</div>
<?php
$this->breadcrumbs = array(
    'Riesgos' => array('index'),
    'Gestión de Riesgos',
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



if ($userRol->rol_id == '2') {
    $this->pageTitle = Yii::app()->name . ' - Linea de Corte de Riesgos';
    $this->menu = array(
        array('label' => 'Crear Riesgo', 'url' => array('create')),
//        array('label'=>'Linea de Corte de Riesgos', 'url'=>array('lineaCorte')),
        array('label' => 'Listar Riesgo', 'url' => array('index')),
        array(),
        array('label' => 'Crear Integrante de Riesgos', 'url' => array('usuario/create')),
        array('label' => 'Gestión de Integrantes de Riesgos', 'url' => array('usuario/admin')),
        array('label' => 'Listar Integrantes de Riesgos', 'url' => array('usuario/index')),
    );
}



echo '<h1>Proyectos</h1>'
?>


<div class="form">
    <div class="row">
        <?php if (!empty($proyectosAsignados)) { ?>
            <?php
            $tablaProyectos = '';
            $tablaProyectos.= '<table border="2" width="80%">';
            $tablaProyectos.='<tr>';
            $tablaProyectos.='<th>Titulo</th>';
            $tablaProyectos.='<th>Descripción</th>';
            $tablaProyectos.='<th>Tipo</th>';
           $tablaProyectos.='<th>Fecha Inicio</th>';
            $tablaProyectos.='<th>Fecha de Finalización</th>';
            $tablaProyectos.='<th>Ver Linea de Corte de Riesgos</th>';
            $tablaProyectos.='</tr>';
            foreach ($proyectosAsignados as $proyecto) {
                $tablaProyectos.='<tr align="center">';
                $tablaProyectos.='<td>' . $proyecto->titulo. '</td>';
                $tablaProyectos.='<td>' . $proyecto->descripcion . '</td>';
                $tablaProyectos.='<td>' . $proyecto->tipo_proyecto. '</td>';
                $tablaProyectos.='<td>' . $proyecto->fecha_inicio . '</td>';
                $tablaProyectos.='<td>' . $proyecto->fecha_fin . '</td>';
                $tablaProyectos.='<td>'. CHtml::link('Linea de '.$proyecto->titulo,array('riesgo/lineaDeCorte','proyecto'=>$proyecto->id_proyecto)). '</td>';
                $tablaProyectos.='</tr>';
            }
            $tablaProyectos.= '</table>';
            echo $tablaProyectos;
            ?>
        
        <?php }else{ ?>
            <h3>No cuentas con proyectos asignados.</h3>
        <?php } ?>
    </div>
</div>
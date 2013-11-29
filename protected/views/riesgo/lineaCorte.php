<?php
$this->breadcrumbs=array(
	'Riesgos'=>array('index'),
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



   if($userRol->rol_id== '2'){
$this->pageTitle=Yii::app()->name . ' - Linea de Corte de Riesgos';
$this->menu=array(
	
	array('label'=>'Crear Riesgo', 'url'=>array('create')),
//        array('label'=>'Linea de Corte de Riesgos', 'url'=>array('lineaCorte')),
        array('label'=>'Listar Riesgo', 'url'=>array('index')),
        
        array(),
        array('label'=>'Crear Integrante de Riesgos', 'url'=>array('usuario/create')),
        array('label'=>'Gestión de Integrantes de Riesgos', 'url'=>array('usuario/admin')),
        array('label'=>'Listar Integrantes de Riesgos', 'url'=>array('usuario/index')),
);
   }



echo '<h1>Proyecto:  '.$proyecto->titulo.' </h1>'

?>

<div class="form">
    <div class="row">
        <?php if (!empty($riesgos)) { ?>
            <?php
            $tablaRiesgo = '';
            $tablaRiesgo.= '<table border="2" width="80%">';
            $tablaRiesgo.='<tr>';
            $tablaRiesgo.='<th>Riesgo</th>';
            $tablaRiesgo.='<th>Categoria</th>';
            $tablaRiesgo.='<th>Tipo</th>';
            $tablaRiesgo.='<th>Probabilidad</th>';
            $tablaRiesgo.='<th>Impacto</th>';
            $tablaRiesgo.='</tr>';
            foreach ($riesgos as $riesgo) {
                $tablaRiesgo.='<tr align="center">';
                $tablaRiesgo.='<td>' . $riesgo->nombre . '</td>';
                $tablaRiesgo.='<td>' . $riesgo->categoria . '</td>';
                $tablaRiesgo.='<td>' . $riesgo->tipo . '</td>';
                $tablaRiesgo.='<td>' . $riesgo->probabilidad . '</td>';
                $tablaRiesgo.='<td>' . $riesgo->impacto . '</td>';
                $tablaRiesgo.='</tr>';
                if ($idRiesgo == $riesgo->id_riesgo) {
                    $tablaRiesgo.='<th colspan="5" bgcolor="C9C9C9">Linea de Corte</th>';
                }
            }
            $tablaRiesgo.= '</table>';
            echo $tablaRiesgo;
            ?>

            <label style="margin-left: 5px">Seleccionar &uacute;ltimo riesgo que sera contemplado:</label>
            <?php
            echo CHtml::beginForm(array('riesgo/editarLinea'), 'post');
            ?>
          
            <select name="C_Riesgos"> 
                <?php
                foreach ($riesgos as $riesgo) {
                    echo "<option value='" . $riesgo->id_riesgo . "'> " . $riesgo->nombre . "</option>";
                }
                ?>
            </select>
               
        
            
            <?php if (!$existeLineaCorte) { ?>
                <?php 
                echo CHtml::hiddenField('idRiesgo', $idRiesgo);
             
                echo CHtml::submitButton('Crear línea de Corte', array('style' => 'margin-left: 10px')); 
                 echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));
              ?>
                    <?php } else { ?>
                <?php
                echo CHtml::hiddenField('idRiesgo', $idRiesgo);
                echo CHtml::submitButton('Editar línea de Corte', array('style' => 'margin-left: 10px'));
                 echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));
                
                ?>
                
            <?php } ?>
           
            <?php echo CHtml::endForm(); ?>
        <?php } else { ?>
            <h3>El proyecto no cuenta con riesgos.</h3>
        <?php } ?>

    </div>
</div>

<div>
    <?php
   
    ?>
</div>
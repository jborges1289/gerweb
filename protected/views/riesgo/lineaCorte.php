
<h1>Proyecto: <?php echo $proyecto->titulo; ?></h1>


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
                echo CHtml::submitButton('Crear línea de Corte', array('style' => 'margin-left: 10px')); ?>
            <?php } else { ?>
                <?php
                echo CHtml::hiddenField('idRiesgo', $idRiesgo);
                echo CHtml::submitButton('Editar línea de Corte', array('style' => 'margin-left: 10px'));
                echo CHtml::submitButton('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));
                ?>
            <?php } ?>
            <?php echo CHtml::endForm(); ?>
        <?php } else { ?>
            El proyecto no cuenta con riesgos.
        <?php } ?>

    </div>
</div>
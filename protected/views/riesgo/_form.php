<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */
/* @var $form CActiveForm */


$sentenciaSQL = new CDbCriteria();
$sentenciaSQL->select = 't.*,r.*';
$sentenciaSQL->join = 'LEFT JOIN usuario r ON r.id_usuario = t.usuario_id';
$sentenciaSQL->condition = 'r.usuario="' . Yii::app()->user->id . '"';
$rolUsuarioLogeado = UsuarioRol::model()->find($sentenciaSQL);

if ($rolUsuarioLogeado->rol_id == 2) {
    $oDBC = new CDbCriteria();
    $oDBC->select = 't.*,p.*';
    $oDBC->join = 'LEFT JOIN equipo_riesgos p ON p.equipo_riesgo = t.id_usuario';
    $oDBC->condition = 'p.admin_riesgos='.$rolUsuarioLogeado->usuario_id;

    $equipoRiesgo = Usuario::model()->findAll($oDBC);
} else {
    $adminEncargado=  EquipoRiesgo::model()->find('equipo_riesgo=:equipoR', array(':equipoR' => $rolUsuarioLogeado->usuario_id));
    $oDBC = new CDbCriteria();
    $oDBC->select = 't.*,p.*';
    $oDBC->join = 'LEFT JOIN equipo_riesgos p ON p.equipo_riesgo = t.id_usuario';
    $oDBC->condition = 'p.admin_riesgos='.$adminEncargado->admin_riesgos;

    $equipoRiesgo = Usuario::model()->findAll($oDBC);
}
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'riesgo-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Los campos que contengan<span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombre'); ?>
        <?php echo $form->textField($model, 'nombre', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'nombre'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'categoria'); ?>
        <?php
        echo $form->dropDownList($model, 'categoria', array('proyecto' => 'Proyecto',
            'tecnico' => 'Técnico', 'negocio' => 'Negocio'), array('empty' => 'Seleccione la Categoria'));
        ?>
        <?php echo $form->error($model, 'categoria'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tipo'); ?>
        <?php
        echo $form->dropDownList($model, 'tipo', array('generico' => 'Génerico',
            'especifico' => 'Específico'), array('empty' => 'Seleccione el Tipo'));
        ?>
        <?php echo $form->error($model, 'tipo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'probabilidad'); ?>
        <?php
        echo $form->dropDownList($model, 'probabilidad', array('.05' => '5%',
            '.10' => '10%', '.15' => '15%', '.20' => '20%', '.25' => '25%',
            '.30' => '30%', '.35' => '35%', '.40' => '40%',
            '.45' => '45%', '.50' => '50%', '.55' => '50%', '.55' => '55%',
            '.60' => '60%', '.65' => '65%', '.70' => '70%', '.75' => '75%',
            '.80' => '80%', '.85' => '85%', '.90' => '95%'), array('empty' => 'Seleccione la Probabilidad'));
        ?>
        <?php echo $form->error($model, 'probabilidad'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'impacto'); ?>
        <?php
        echo $form->dropDownList($model, 'impacto', array('catastrofico' => 'Catastrófico',
            'critico' => 'Crítico', 'marginal' => 'Marginal', 'despreciable' => 'Despreciable'), array('empty' => 'Seleccione el Impacto'));
        ?>
        <?php echo $form->error($model, 'impacto'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'fecha',
            'language' => 'es',
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
                'defaultDate' => $model->fecha,
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '1900',
                'value' => date('Y-m-d'),
            ),
        ));
        ?>
        <?php echo $form->error($model, 'fecha'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'descripcion'); ?>
        <?php echo $form->textArea($model, 'descripcion', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'descripcion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'factores_influyen'); ?>
        <?php echo $form->textArea($model, 'factores_influyen', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'factores_influyen'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'reduccion'); ?>
        <?php echo $form->textArea($model, 'reduccion', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'reduccion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'plan_contigencia'); ?>
        <?php echo $form->textArea($model, 'plan_contigencia', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'plan_contigencia'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'redactor'); ?>
        <?php
        $redactor = CHtml::listData($equipoRiesgo, 'id_usuario', 'nombres');
        echo $form->dropDownList($model, 'redactor', $redactor, array('empty' => 'Seleccione Redactor'));
        ?>
        <?php echo $form->error($model, 'redactor'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'responsable'); ?>
        <?php
        $responsable = CHtml::listData($equipoRiesgo, 'id_usuario', 'nombres');
        echo $form->dropDownList($model, 'responsable', $responsable, array('empty' => 'Seleccione Responsable'));
        ?>
        <?php echo $form->error($model, 'responsable'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'id_proyecto'); ?>
        <?php
        if ($rolUsuarioLogeado->rol_id == 2) {
            $proyectos = CHtml::listData((Proyecto::model()->findAll('admin_riesgo=:adminR', array(':adminR' => $rolUsuarioLogeado->usuario_id))), 'id_proyecto', 'titulo');
            echo $form->dropDownList($model, 'id_proyecto', $proyectos, array('empty' => 'Seleccione Proyecto'));
        } else {
            $sentenciaSQL = new CDbCriteria();
            $sentenciaSQL->select = 't.*,er.*';
            $sentenciaSQL->join = 'LEFT JOIN equipo_riesgos er ON t.admin_riesgo = er.admin_riesgos';
            $sentenciaSQL->condition = 'er.equipo_riesgo=' . $rolUsuarioLogeado->usuario_id;
            $proyectos = CHtml::listData((Proyecto::model()->findAll($sentenciaSQL)), 'id_proyecto', 'titulo');
            echo $form->dropDownList($model, 'id_proyecto', $proyectos, array('empty' => 'Seleccione Proyecto'));
        }
        ?>
        <?php echo $form->error($model, 'id_proyecto'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'linea_corte'); ?>
        <?php echo $form->hiddenField($model, 'linea_corte'); ?>
        <?php echo $form->error($model, 'linea_corte'); ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Editar');
        echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px', 'onClick' => 'history.go(-1)'));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
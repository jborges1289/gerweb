<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */


$oDBC = new CDbCriteria();
$oDBC->select = 't.*,p.*'; 
$oDBC->join = 'LEFT JOIN usuario_rol p ON t.id_usuario = p.usuario_id'; 
$oDBC->condition = 'p.rol_id = 1 ';

$admon_proy = Usuario::model()->findAll($oDBC);


$query = new CDbCriteria();
$query->select = 't.*,p.*'; 
$query->join = 'LEFT JOIN usuario_rol p ON t.id_usuario = p.usuario_id'; 
$query->condition = 'p.rol_id = 2 ';

$admon_ries = Usuario::model()->findAll($query);


?>






<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'proyecto-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'titulo'); ?>
        <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 95)); ?>
        <?php echo $form->error($model, 'titulo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'descripcion'); ?>
        <?php echo $form->textArea($model, 'descripcion', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'descripcion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tipo_proyecto'); ?>
        <?php echo $form->dropDownList($model, 'tipo_proyecto', array('web' => 'Web',
            'escritorio' => 'Escritorio',), array('empty' => 'Seleccione el tipo'));
        ?>
        <?php echo $form->error($model, 'tipo_proyecto'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_inicio'); ?>

        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'fecha_inicio',
            'language' => 'es',
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
                'defaultDate' => $model->fecha_inicio,
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '1900',
                'value' => date('Y-m-d'),
            ),
        ));
        ?>
        <?php echo $form->error($model, 'fecha_inicio'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_fin'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'fecha_fin',
            'language' => 'es',
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
                'defaultDate' => $model->fecha_fin,
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '1900',
                'value' => date('Y-m-d'),
            ),
        ));
        ?>
        <?php echo $form->error($model, 'fecha_fin'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'administrador'); ?>
        <?php
        $admin = CHtml::listData($admon_proy, 'id_usuario', 'nombres');
        echo $form->dropDownList($model, 'administrador', $admin, array('empty' => 'Seleccione Administrador'));
        ?>
        <?php echo $form->error($model, 'administrador'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'admin_riesgo'); ?>
        <?php
        $admin_riesgo = CHtml::listData($admon_ries, 'id_usuario', 'nombres');
        echo $form->dropDownList($model, 'admin_riesgo', $admin_riesgo, array('empty' => 'Seleccione Admin de Riesgos'));
        ?>
        <?php echo $form->error($model, 'admin_riesgo'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Editar'); 
        echo CHtml::Button('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-1)'));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
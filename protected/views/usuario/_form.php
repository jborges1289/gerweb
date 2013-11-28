<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
$usuario = Usuario::model()->find('usuario=:user', array('user' => Yii::app()->user->id));
$rol = UsuarioRol::model()->find('usuario_id=:usuario', array(':usuario' => $usuario->id_usuario))->rol_id;
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuario-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Campos con <span class="required">*</span> son necesarios.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'usuario'); ?>
        <?php echo $form->textField($model, 'usuario', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'usuario'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'contrasena'); ?>
        <?php echo $form->passwordField($model, 'contrasena', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'contrasena'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'confirmarContrasena'); ?>
        <?php echo $form->passwordField($model, 'confirmarContrasena', array('size' => 35, 'maxlength' => 35)); ?>
        <?php echo $form->error($model, 'confirmarContrasena'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombres'); ?>
        <?php echo $form->textField($model, 'nombres', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'nombres'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'primer_apellido'); ?>
        <?php echo $form->textField($model, 'primer_apellido', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'primer_apellido'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'segundo_apellido'); ?>
        <?php echo $form->textField($model, 'segundo_apellido', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'segundo_apellido'); ?>
    </div>

    <div class="row">

        <?php echo $form->labelEx($model, 'perfil'); ?>
        <?php
        if ($rol == 1) {
            $rolAdmin = Roles::model()->findByPk(2);
            echo $form->hiddenField($model, 'perfil', array('value' => $rolAdmin->id));
        } else {
            if ($rol == 2) {
                $rolAdmin = Roles::model()->findByPk(3);
                echo $form->hiddenField($model, 'perfil', array('value' => $rolAdmin->id));
            }
        }
        ?>
        <?php echo $form->error($model, 'perfil'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Editar'); 
        echo CHtml::submitButton('Volver a página anterior', array('style' => 'margin-left: 10px','onClick'=>'history.go(-2)'));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
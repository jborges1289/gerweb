<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

if (isset(Yii::app()->user->id)) {
    $oDBC = new CDbCriteria();
    $oDBC->select = 't.*,p.*';
    $oDBC->join = 'LEFT JOIN usuario p ON p.id_usuario = t.usuario_id';
    $oDBC->condition = 'p.usuario="'.Yii::app()->user->id.'"';
    $userRol = UsuarioRol::model()->find($oDBC);
    if ($userRol->rol_id == '1') {
        $this->redirect('index.php?r=proyecto/admin');
    } else if ($userRol->rol_id == '2') {

        $this->redirect('index.php?r=riesgo/admin');
    } else if ($userRol->rol_id == '3') {
        $this->redirect('index.php?r=riesgo/index');
    } else {
        $this->redirect('index.php?r=index/login');
    }
}

$this->pageTitle = Yii::app()->name . ' - Inicio';
$this->breadcrumbs = array(
    'Inicio',
);
?>

<h1>Ingresar</h1>

<p class="alert alert-info">Por favor complete el siguiente formulario con sus datos de acceso:</p>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <p class="note">Campos con <span class="required" >*</span> son requeridos.</p>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
<!--		<p class="hint">
                    Sugerencia: Es posible ingresar con <kbd>demo</kbd>/<kbd>demo</kbd> o <kbd>admin</kbd>/<kbd>admin</kbd>.
            </p>-->
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Entrar'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->

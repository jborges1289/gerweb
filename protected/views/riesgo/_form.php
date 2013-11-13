<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'riesgo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos que contengan<span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria'); ?>
		<?php echo $form->textField($model,'categoria',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'probabilidad'); ?>
		<?php echo $form->textField($model,'probabilidad',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'probabilidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impacto'); ?>
		<?php echo $form->textField($model,'impacto',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'impacto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'factores_influyen'); ?>
		<?php echo $form->textArea($model,'factores_influyen',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'factores_influyen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reduccion'); ?>
		<?php echo $form->textArea($model,'reduccion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reduccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plan_contigencia'); ?>
		<?php echo $form->textArea($model,'plan_contigencia',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'plan_contigencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'redactor'); ?>
		<?php echo $form->textField($model,'redactor',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'redactor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'responsable'); ?>
		<?php echo $form->textField($model,'responsable',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'responsable'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
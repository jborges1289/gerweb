<?php
/* @var $this ProyectoController */
/* @var $data Proyecto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_proyecto), array('view', 'id'=>$data->id_proyecto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('administrador')); ?>:</b>
	<?php echo CHtml::encode($data->administrador); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_riesgo')); ?>:</b>
	<?php echo CHtml::encode($data->admin_riesgo); ?>
	<br />
      
	*/ ?>

</div>
<br>
<br>
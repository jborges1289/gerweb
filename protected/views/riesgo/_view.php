<?php
/* @var $this RiesgoController */
/* @var $data Riesgo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_riesgo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_riesgo), array('view', 'id'=>$data->id_riesgo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria')); ?>:</b>
	<?php echo CHtml::encode($data->categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('probabilidad')); ?>:</b>
	<?php echo CHtml::encode($data->probabilidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impacto')); ?>:</b>
	<?php echo CHtml::encode($data->impacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('factores_influyen')); ?>:</b>
	<?php echo CHtml::encode($data->factores_influyen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reduccion')); ?>:</b>
	<?php echo CHtml::encode($data->reduccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_contigencia')); ?>:</b>
	<?php echo CHtml::encode($data->plan_contigencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('redactor')); ?>:</b>
	<?php echo CHtml::encode($data->redactor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsable')); ?>:</b>
	<?php echo CHtml::encode($data->responsable); ?>
	<br />
         
        <b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linea_corte')); ?>:</b>
	<?php echo CHtml::encode($data->linea_corte); ?>
	<br />

	*/ ?>

</div>
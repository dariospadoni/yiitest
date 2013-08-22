<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenuto')); ?>:</b>
	<?php echo CHtml::decode($data->contenuto); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('ultima_modifica')); ?>:</b>
	<?php echo CHtml::encode($data->ultima_modifica); ?>
	<br />


</div>
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_paziente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_paziente), array('view', 'id'=>$data->id_paziente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cf')); ?>:</b>
	<?php echo CHtml::encode($data->cf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cognome')); ?>:</b>
	<?php echo CHtml::encode($data->cognome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indirizzo')); ?>:</b>
	<?php echo CHtml::encode($data->indirizzo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('citta')); ?>:</b>
	<?php echo CHtml::encode($data->citta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cap')); ?>:</b>
	<?php echo CHtml::encode($data->cap); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	*/ ?>

</div>
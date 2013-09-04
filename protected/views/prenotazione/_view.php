<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_prenotazione')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_prenotazione), array('view', 'id'=>$data->id_prenotazione)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_fondo')); ?>:</b>
	<?php echo CHtml::encode($data->id_fondo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_prestazione')); ?>:</b>
	<?php echo CHtml::encode($data->id_prestazione); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_paziente')); ?>:</b>
	<?php echo CHtml::encode($data->id_paziente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_creazione')); ?>:</b>
	<?php echo CHtml::encode($data->data_creazione); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_visita')); ?>:</b>
	<?php echo CHtml::encode($data->data_visita); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assegnata')); ?>:</b>
	<?php echo CHtml::encode($data->assegnata); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('note_paziente')); ?>:</b>
	<?php echo CHtml::encode($data->note_paziente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note_gmc')); ?>:</b>
	<?php echo CHtml::encode($data->note_gmc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	*/ ?>

</div>
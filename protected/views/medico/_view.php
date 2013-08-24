<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_medico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_medico), array('view', 'id'=>$data->id_medico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('specializzazione')); ?>:</b>
	<?php echo CHtml::encode($data->specializzazione); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formazione')); ?>:</b>
	<?php echo CHtml::encode($data->formazione); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esperienze_precedenti')); ?>:</b>
	<?php echo CHtml::encode($data->esperienze_precedenti); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attivita_accademica')); ?>:</b>
	<?php echo CHtml::encode($data->attivita_accademica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attivita_scientifica')); ?>:</b>
	<?php echo CHtml::encode($data->attivita_scientifica); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pubblicazioni')); ?>:</b>
	<?php echo CHtml::encode($data->pubblicazioni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />

	*/ ?>

</div>
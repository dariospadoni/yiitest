<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_fondo_prestazione')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_fondo_prestazione), array('view', 'id'=>$data->id_fondo_prestazione)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_fondo')); ?>:</b>
	<?php echo CHtml::encode($data->id_fondo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_prestazione')); ?>:</b>
	<?php echo CHtml::encode($data->id_prestazione); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prezzo')); ?>:</b>
	<?php echo CHtml::encode($data->prezzo); ?>
	<br />


</div>
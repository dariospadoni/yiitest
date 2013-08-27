<?php
/* @var $this PrestazioneController */
/* @var $data Prestazione */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_prestazione')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_prestazione), array('update', 'id'=>$data->id_prestazione)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codice')); ?>:</b>
	<?php echo CHtml::encode($data->codice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descrizione')); ?>:</b>
	<?php echo CHtml::encode($data->descrizione); ?>
	<br />


</div>
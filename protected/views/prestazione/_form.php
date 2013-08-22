<?php
/* @var $this PrestazioneController */
/* @var $model Prestazione */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prestazione-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,

)); ?>

	<p class="note">I campi contrassegnati da <span class="required">*</span> sono obbligatori.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codice'); ?>
		<?php echo $form->textField($model,'codice',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'codice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descrizione'); ?>
		<?php echo $form->textArea($model,'descrizione',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descrizione'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crea' : 'Salva'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'fondo-prestazione-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'id_fondo'); ?>">
		<?php echo $form->labelEx($model,'id_fondo'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_fondo'); ?>
			<?php echo $form->error($model,'id_fondo'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'id_prestazione'); ?>">
		<?php echo $form->labelEx($model,'id_prestazione'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_prestazione'); ?>
			<?php echo $form->error($model,'id_prestazione'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'prezzo'); ?>">
		<?php echo $form->labelEx($model,'prezzo'); ?>
		<div class="input">
			<?php echo $form->textField($model,'prezzo'); ?>
			<?php echo $form->error($model,'prezzo'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
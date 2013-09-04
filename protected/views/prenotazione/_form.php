
<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'prenotazione-form',
	'enableAjaxValidation'=>false,
)); ?>

    <?php $this->widget('BAlert',array( 'content'=>'<p>I campi contrassegnati da <span class="required">*</span> sono obbligatori.</p>' )); ?>

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

	<div class="<?php echo $form->fieldClass($model, 'id_paziente'); ?>">
		<?php echo $form->labelEx($model,'id_paziente'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_paziente'); ?>
			<?php echo $form->error($model,'id_paziente'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'data_creazione'); ?>">
		<?php echo $form->labelEx($model,'data_creazione'); ?>
		<div class="input">
			<?php echo $form->textField($model,'data_creazione'); ?>
			<?php echo $form->error($model,'data_creazione'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'data_visita'); ?>">
		<?php echo $form->labelEx($model,'data_visita'); ?>
		<div class="input">
<?php
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'data_visita',
            'language' => 'it',
            'themeUrl'=>'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes',
            'theme'=>'overcast',
            'options'=>array(
                'showAnim'=>'fold',
            ),
            ));
?>
			<?php echo $form->error($model,'data_visita'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'assegnata'); ?>">
		<div class="input">
			<?php echo $form->checkBox($model,'assegnata'); ?>
			<?php echo $form->error($model,'assegnata'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'note_paziente'); ?>">
		<?php echo $form->labelEx($model,'note_paziente'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'note_paziente',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'note_paziente'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'note_gmc'); ?>">
		<?php echo $form->labelEx($model,'note_gmc'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'note_gmc',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'note_gmc'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'id_user'); ?>">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_user'); ?>
			<?php echo $form->error($model,'id_user'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
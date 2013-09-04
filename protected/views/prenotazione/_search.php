<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id_prenotazione'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_prenotazione'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'id_fondo'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_fondo'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'id_prestazione'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_prestazione'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'id_paziente'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_paziente'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'data_creazione'); ?>
		<div class="input">
			<?php echo $form->textField($model,'data_creazione'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'data_visita'); ?>
		<div class="input">
			<?php echo $form->textField($model,'data_visita'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'assegnata'); ?>
		<div class="input">
			<?php echo $form->textField($model,'assegnata'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'note_paziente'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'note_paziente',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'note_gmc'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'note_gmc',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'id_user'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_user'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
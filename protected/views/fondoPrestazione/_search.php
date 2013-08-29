<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id_fondo_prestazione'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_fondo_prestazione'); ?>
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
		<?php echo $form->label($model,'prezzo'); ?>
		<div class="input">
			<?php echo $form->textField($model,'prezzo'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
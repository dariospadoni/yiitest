<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id_medico'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_medico'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'id_user'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_user'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'specializzazione'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'specializzazione',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'formazione'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'formazione',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'esperienze_precedenti'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'esperienze_precedenti',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'attivita_accademica'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'attivita_accademica',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'attivita_scientifica'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'attivita_scientifica',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'pubblicazioni'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'pubblicazioni',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'foto'); ?>
		<div class="input">
			<?php echo $form->textField($model,'foto'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
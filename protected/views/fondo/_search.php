<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id_fondo'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_fondo'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'nome'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>200)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'descrizione'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'descrizione',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'sito_web'); ?>
		<div class="input">
			<?php echo $form->textField($model,'sito_web',array('size'=>60,'maxlength'=>256)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'logo'); ?>
		<div class="input">
			<?php echo $form->textField($model,'logo'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
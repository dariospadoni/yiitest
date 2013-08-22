<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id_pagina'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id_pagina'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'nome'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>200)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'contenuto'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'contenuto',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'ordine'); ?>
		<div class="input">
			<?php echo $form->textField($model,'ordine'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'ultima_modifica'); ?>
		<div class="input">
			<?php echo $form->textField($model,'ultima_modifica'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
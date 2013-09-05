<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'nome_prestazione'); ?>
		<div class="input">
            <?php echo $form->ListBox   ($model,'id_prestazione', CHtml::listData( Prestazione::model()->findAll(), 'id_prestazione', 'nome'),array('multiple' => 'true' )   ); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'cognome_paziente'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nomePaziente'); ?>
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


	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
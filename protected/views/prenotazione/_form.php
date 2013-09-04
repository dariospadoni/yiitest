
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
                <?php echo $form->dropDownList($model,'id_fondo', CHtml::listData( $fondi, 'id_fondo', 'nome')  ); ?>
                <?php echo $form->error($model,'id_fondo'); ?>
            </div>
        </div>




    <div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Invia' : 'Salva'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
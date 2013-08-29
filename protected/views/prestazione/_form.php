
<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'prestazione-form',
	'enableAjaxValidation'=>true,
)); ?>


<?php
    Yii::import('ext.yii-redactor.ERedactorWidget');
?>


<?php $this->widget('BAlert',array( 'content'=>'<p>I campi contrassegnati da <span class="required">*</span> sono obbligatori.</p>' )); ?>

<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="<?php echo $form->fieldClass($model, 'nome'); ?> span1">
            <?php echo $form->labelEx($model,'nome'); ?>
            <div class="input">
                <?php echo $form->textField($model,'nome',array('size'=>100,'maxlength'=>200)); ?>
                <?php echo $form->error($model,'nome'); ?>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'codice'); ?> span3">
            <?php echo $form->labelEx($model,'codice'); ?>
            <div class="input">
                <?php echo $form->textField($model,'codice',array('size'=>20,'maxlength'=>20)); ?>
                <?php echo $form->error($model,'codice'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'prezzo'); ?> span3">
            <?php echo $form->labelEx($model,'prezzo'); ?>
            <div class="input">
                <?php echo $form->textField($model,'prezzo',array('size'=>20,'maxlength'=>20)); ?>
                <?php echo $form->error($model,'prezzo'); ?>
            </div>
        </div>

    </div>

    <div class="row">
    <div class="<?php echo $form->fieldClass($model, 'codice'); ?>">
		<?php echo $form->labelEx($model,'descrizione'); ?><br/> <br/>
        <div class="input">
            <?php echo $form->textArea($model,'descrizione',array('rows'=>6, 'class'=>'textarea')); ?>
            <?php echo $form->error($model,'descrizione'); ?>
        </div>
	</div>
    </div>

    <div class="row">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crea' : 'Salva'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<?php
$this->widget('ERedactorWidget',array(
    'options' => array(
        'lang' => 'it',
        'minHeight'=>100,
        'buttons'=>array(
            'bold', 'italic', '|',
            'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',)
    ),
    'selector'=>'.textarea'
));
?>





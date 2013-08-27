<?php
/* @var $this PrestazioneController */
/* @var $model Prestazione */
/* @var $form CActiveForm */
?>

<style>
    input, textarea { width:auto; }
    .form-horizontal .control-label { text-align: left; width:90px;}
</style>


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

    <div class="<?php echo $form->fieldClass($model, 'nome'); ?>">
		<?php echo $form->labelEx($model,'nome'); ?>
        <div class="input">
            <?php echo $form->textField($model,'nome',array('size'=>100,'maxlength'=>200)); ?>
            <?php echo $form->error($model,'nome'); ?>
        </div>
    </div>

    <div class="<?php echo $form->fieldClass($model, 'codice'); ?>">
		<?php echo $form->labelEx($model,'codice'); ?>
        <div class="input">
            <?php echo $form->textField($model,'codice',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'codice'); ?>
        </div>
    </div>

    <div class="<?php echo $form->fieldClass($model, 'codice'); ?>">
		<?php echo $form->labelEx($model,'descrizione'); ?><br/> <br/>
        <div class="input">
            <?php echo $form->textArea($model,'descrizione',array('rows'=>6, 'class'=>'textarea')); ?>
            <?php echo $form->error($model,'descrizione'); ?>
        </div>
	</div>

    <div class="actions">
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





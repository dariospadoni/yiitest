
<div class="form">

    <?php $form=$this->beginWidget('BActiveForm', array(
        'id'=>'prenotazione-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="<?php echo $form->fieldClass($model, 'id_prestazione'); ?>">
        <?php echo $form->labelEx($model,'nome'); ?>
        <div class="input">
            <?php echo $form->dropDownList($model,'id_prestazione', CHtml::listData( $prestazioni, 'id_prestazione', 'nomePrestazione')  ); ?>
            <?php echo $form->error($model,'id_prestazione'); ?>
        </div>
    </div>

    <div class="actions">
        <?php echo BHtml::submitButton('Avanti'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<div class="form">

    <?php $form=$this->beginWidget('BActiveForm', array(
        'id'=>'prenotazione-form',
        'enableAjaxValidation'=>false,
    )); ?>


    <div class="<?php echo $form->fieldClass($model, 'id_fondo'); ?>">
        <?php echo $form->labelEx($model,'id_fondo'); ?>
        <div class="input">
            <?php echo $form->dropDownList($model,'id_fondo', CHtml::listData( $fondi, 'id_fondo', 'nome')  ); ?>
            <?php echo $form->error($model,'id_fondo'); ?>
        </div>
    </div>


    <div class="actions">
        <?php echo BHtml::submitButton('Avanti'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
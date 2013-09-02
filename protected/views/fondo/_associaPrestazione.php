

<div class="form modal hide fade" id="nuovo-prestazione-fondo-dialog">


    <?php
    $form=$this->beginWidget('BActiveForm', array(
        'id'=>'nuovo-prestazione-fondo-form',
        'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
        'clientOptions'=>array('validateOnSubmit'=>true,'validateOnChange'=>true,'afterValidate'=> 'js:submitAssociaPrestazione' )
    )); ?>

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Associa nuova prestazione</h3>
    </div>

    <div class="modal-body">

        <?php $this->widget('BAlert',array( 'content'=>'<p>I campi contrassegnati da <span class="required">*</span> sono obbligatori.</p>' )); ?>

        <?php $fondoPrestazione = new FondoPrestazione();  ?>

        <div class="row">

            <div class="<?php echo $form->fieldClass($fondoPrestazione, 'Prestazione'); ?> span4">
                <div class="input">
                    <?php echo $form->labelEx($fondoPrestazione,'Prestazione'); ?>
                    <?php echo $form->dropDownList($fondoPrestazione,'id_prestazione', CHtml::listData( $model->prestazioniNonAssociate , 'id_prestazione', 'nome')  ); ?>
                </div>
            </div>

            <div class="<?php echo $form->fieldClass($fondoPrestazione, 'prezzo'); ?> span2">
                <?php echo $form->labelEx($fondoPrestazione,'prezzo'); ?>
                <div class="input">
                    <?php echo $form->textField($fondoPrestazione,'prezzo',array('size'=>6)); ?>
                    <?php echo $form->error($fondoPrestazione,'prezzo'); ?>
                </div>
            </div>


        </div>


    </div>

    <div class="modal-footer">
        <?php echo $form->hiddenField($model,'id_fondo' ); ?>

        <?php echo CHtml::submitButton('Aggiungi',array(  Yii::app()->createUrl('fondo/update&id=1')));    ?>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

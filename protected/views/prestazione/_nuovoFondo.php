

<div class="form modal hide fade" id="nuovo-fondo-prestazione-dialog">


<?php
    $form=$this->beginWidget('BActiveForm', array(
        'id'=>'nuovo-fondo-prestazione-form',
        'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
        //'validationUrl'=> CHtml::normalizeUrl(array('prestazione/addFondo')),
       // 'action'=>Yii::app()->createUrl('prestazione/update&id=1'),
        'clientOptions'=>array('validateOnSubmit'=>true,'validateOnChange'=>true,'afterValidate'=> 'js:doSubmit' )
    )); ?>

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Aggiungi fondo</h3>
    </div>

    <div class="modal-body">

    <?php $this->widget('BAlert',array( 'content'=>'<p>I campi contrassegnati da <span class="required">*</span> sono obbligatori.</p>' )); ?>

    <?php $fondoPrestazione = new FondoPrestazione();  ?>

    <div class="row">

        <div class="<?php echo $form->fieldClass($fondoPrestazione, 'nome'); ?> span4">
            <div class="input">
                <?php echo $form->labelEx($fondoPrestazione,'nome'); ?>
                <?php echo $form->dropDownList($fondoPrestazione,'id_fondo', CHtml::listData( $model->fondiDisponibili , 'id_fondo', 'nome')  ); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'prezzo'); ?> span2">
            <?php echo $form->labelEx($model,'prezzo'); ?>
            <div class="input">
                <?php echo $form->textField($model,'prezzo',array('size'=>6)); ?>
                <?php echo $form->error($model,'prezzo'); ?>
            </div>
        </div>


    </div>


    </div>

    <div class="modal-footer">
        <?php echo $form->hiddenField($model,'id_prestazione' ); ?>

        <?php echo CHtml::submitButton('Aggiungi',array(  Yii::app()->createUrl('prestazione/update&id=1')));    ?>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

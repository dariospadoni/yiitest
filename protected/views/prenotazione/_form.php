<style>
    .form-horizontal .control-label { float:none; width:auto; text-align: left;}
    [class*="span"] { margin-left:0;}
    input,textarea { width:auto; }
    .label120{float:left !important; width:100px !important;}
</style>


<div class="form">

    <?php $form=$this->beginWidget('BActiveForm', array(
        'id'=>'prenotazione-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="well well-small">
        <b>Prestazione</b>

        <div class="row">

            <div class="<?php echo $form->fieldClass($model, 'id_fondo'); ?> span4">
                <?php echo $form->labelEx($model,'Fondo',array('class'=>' label120')); ?>
                <div class="input">
                    <?php echo $form->dropDownList($model,'id_fondo', CHtml::listData( Fondo::model()->findAll(), 'id_fondo', 'nome'),
                        array(
                            'ajax' => array(
                                'type'=>'GET',
                                    'url'=>CController::createUrl('prestazioniAssociate'),
                                    'dataType'=>'json',
                                   // 'update'=>'#Prenotazione_id_prestazione',
                                    'data'=>array('idFondo'=>'js:this.value'),
                                    'success'=>'function(data) {
                                            $("#Prenotazione_id_prestazione").html(data.data);
                                    }'
                            )));
                            ?>
                    <?php echo $form->error($model,'id_fondo'); ?>
                </div>
            </div>


            <div class="<?php echo $form->fieldClass($model, 'id_prestazione'); ?> span4">
                <?php echo $form->labelEx($model,'Prestazione',array('class'=>' label120')); ?>
                <div class="input">
                    <?php echo $form->dropDownList($model,'id_prestazione', CHtml::listData( $prestazioni, 'id_prestazione', 'nomePrestazione')  ); ?>
                    <?php echo $form->error($model,'id_prestazione'); ?>
                </div>
            </div>


        </div>
    </div>

    <div class="well well-small">

        <b>Visita</b>

            <div class="row">

                <div class="<?php echo $form->fieldClass($model, 'data_visita'); ?> span4">
                    <?php echo $form->label($model,'data_visita' , array('style'=>'display:inline-block;') ) ; ?>

                    <?php

                    $this->widget('ext.timepicker.EJuiDateTimePicker',array(
                        'name'=>'Prenotazione[data_visita]',
                        'language' => 'it',
                        'value'=>$model->data_visita,
                        'options'=>array(
                            'hourMin'=>6,
                            'hourMax'=>22,
                            'showAnim'=>'fold',
                            'showOn' => 'button',
                            'hourGrid' => 4,
                            'stepMinute'=>10,
                            'minuteGrid'=>10,
                            'hourText'=>'Ora',
                            'minuteText'=>'Minuti',
                            'controlType'=>'select',
                            'currentText'=>'Adesso'
                        ),
                        'htmlOptions'=>array(
                            'size'=>20
                        ),
                    ));
                    ?>

                    <?php echo $form->error($model,'data_visita'); ?>

                </div>



            </div>
        </div>


    <div class="well well-small">

        <b>Dati paziente</b>

        <div class="row">

            <div class="<?php echo $form->fieldClass($paziente, 'nome'); ?> span4">
                <?php echo $form->labelEx($paziente,'nome'); ?>
                <div class="input">
                    <?php echo $form->textField($paziente,'nome',array('size'=>30,'maxlength'=>100)); ?>
                    <?php echo $form->error($paziente,'nome'); ?>
                </div>
            </div>

            <div class="<?php echo $form->fieldClass($paziente, 'cognome'); ?> span4">
                <?php echo $form->labelEx($paziente,'cognome'); ?>
                <div class="input">
                    <?php echo $form->textField($paziente,'cognome',array('size'=>30,'maxlength'=>100)); ?>
                    <?php echo $form->error($paziente,'cognome'); ?>
                </div>
            </div>

            <div class="<?php echo $form->fieldClass($paziente, 'cognome'); ?> span1">
                <?php echo $form->labelEx($paziente,'sesso'); ?>
                <div class="input">
                    <?php echo $form->dropDownList($paziente,'sesso',array("0"=>"M","1"=>"F"),array('style'=>'width:60px')); ?>
                    <?php echo $form->error($paziente,'sesso'); ?>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="<?php echo $form->fieldClass($paziente, 'data_nascita'); ?> span3">
                <?php echo $form->labelEx($paziente,'data_nascita' . ' (gg/mm/aaaa)') ; ?>
                <div class="input">

                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'name'=>'Paziente[data_nascita]',
                        'language' => 'it',
                        'options'=>array(
                            'showAnim'=>'fold',
                            // 'dateFormat'=>'dd/mm/yyyy',
                            'showOn' => 'button'
                        ),
                        'htmlOptions'=>array(
                            'size'=>10
                        ),
                    ));
                    ?>

                    <?php echo $form->error($paziente,'data_nascita'); ?>
                </div>
            </div>

            <div class="<?php echo $form->fieldClass($paziente, 'citta_nascita'); ?> span2">
                <?php echo $form->labelEx($paziente,'citta_nascita'); ?>
                <div class="input">
                    <?php
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Paziente[citta_nascita]',
                        'sourceUrl' => array('site/suggestComuni'),
                        'value' => $paziente->citta_nascita,
                        'options' => array(
                            'showAnim' => 'fold',
                            'select' => 'js:function(e, ui){
                                     e.preventDefault() // <--- Prevent the value from being inserted.
                                    $(this).val(ui.item.label);
                                    jQuery("#cod_istat").val(ui.item["value"]); }'
                        ),
                        'htmlOptions'=>array(
                            'size'=>'30',
                            'maxLength'=>100
                        ),
                    ));

                    ?>
                    <input type="hidden" name="cod_istat" id="cod_istat" />

                    <?php echo $form->error($paziente,'citta_nascita'); ?>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="<?php echo $form->fieldClass($paziente, 'cf'); ?> span5">
                <?php echo $form->labelEx($paziente,'cf'); ?>
                <div class="input">
                    <?php echo $form->textField($paziente,'cf',array('size'=>20,'maxlength'=>16)); ?>
                    <button class="btn btn-mini" id="btnCalcolaCf">Calcola</button>
                    <?php echo $form->error($paziente,'cf'); ?>
                </div>

            </div>


        </div>

        <div class="row">
            <div class="<?php echo $form->fieldClass($paziente, 'indirizzo'); ?> span1">
                <?php echo $form->labelEx($paziente,'indirizzo'); ?>
                <div class="input">
                    <?php echo $form->textField($paziente,'indirizzo',array('size'=>80,'maxlength'=>250)); ?>
                    <?php echo $form->error($paziente,'indirizzo'); ?>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="<?php echo $form->fieldClass($paziente, 'citta'); ?> span4">
                <?php echo $form->labelEx($paziente,'citta'); ?>
                <div class="input">
                    <?php echo $form->textField($paziente,'citta',array('size'=>40,'maxlength'=>100)); ?>
                    <?php echo $form->error($paziente,'citta'); ?>
                </div>
            </div>

            <div class="<?php echo $form->fieldClass($paziente, 'provincia'); ?> span2">
                <?php echo $form->labelEx($paziente,'provincia'); ?>
                <div class="input">
                    <?php echo $form->textField($paziente,'provincia',array('size'=>2,'maxlength'=>100)); ?>
                    <?php echo $form->error($paziente,'provincia'); ?>
                </div>
            </div>

            <div class="<?php echo $form->fieldClass($paziente, 'cap'); ?> span1">
                <?php echo $form->labelEx($paziente,'cap'); ?>
                <div class="input">
                    <?php echo $form->textField($paziente,'cap',array('size'=>2,'maxlength'=>10)); ?>
                    <?php echo $form->error($paziente,'cap'); ?>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="<?php echo $form->fieldClass($paziente, 'telefono'); ?> span4">
                <?php echo $form->labelEx($paziente,'telefono'); ?>
                <div class="input">
                    <?php echo $form->textField($paziente,'telefono',array('size'=>30,'maxlength'=>30)); ?>
                    <?php echo $form->error($paziente,'telefono'); ?>
                </div>
            </div>

            <div class="<?php echo $form->fieldClass($paziente, 'email'); ?> span4">
                <?php echo $form->labelEx($paziente,'email'); ?>
                <div class="input">
                    <?php echo $form->textField($paziente,'email',array('size'=>40,'maxlength'=>100)); ?>
                    <?php echo $form->error($paziente,'email'); ?>
                </div>
            </div>

        </div>

 </div>





    <div class="actions">
        <br/>
        <?php
        if($mode!='view')
            echo BHtml::submitButton( 'Conferma' , array('name'=>"confirm"));
        ?>
    </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->
<link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fileupload-ui.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/codFisc.js" ></script>
 <style>
    .form-horizontal .control-label { float:none; width:auto; text-align: left;}
    [class*="span"] { margin-left:0;}
    input,textarea { width:auto; }
</style>



<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'paziente-form',
    'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true
    )
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'nome'); ?> span4">
            <?php echo $form->labelEx($model,'nome'); ?>
            <div class="input">
                <?php echo $form->textField($model,'nome',array('size'=>30,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'nome'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'cognome'); ?> span4">
            <?php echo $form->labelEx($model,'cognome'); ?>
            <div class="input">
                <?php echo $form->textField($model,'cognome',array('size'=>30,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'cognome'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'cognome'); ?> span1">
            <?php echo $form->labelEx($model,'sesso'); ?>
            <div class="input">
                <?php echo $form->dropDownList($model,'sesso',array("0"=>"M","1"=>"F"),array('style'=>'width:60px')); ?>
                <?php echo $form->error($model,'sesso'); ?>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="<?php echo $form->fieldClass($model, 'data_nascita'); ?> span4">
            <?php echo $form->labelEx($model,'data_nascita' . ' (gg/mm/aaaa)') ; ?>
            <div class="input">

                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'Paziente[data_nascita]',
                    'language' => 'it',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'dd/mm/yyyy',
                        'showOn' => 'button'
                    ),
                    'htmlOptions'=>array(
                        'size'=>10
                    ),
                ));
                ?>

                <?php echo $form->error($model,'data_nascita'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'citta_nascita'); ?> span4">
            <?php echo $form->labelEx($model,'citta_nascita'); ?>
            <div class="input">
                <?php
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Paziente[citta_nascita]',
                        'sourceUrl' => array('site/suggestComuni'),
                        'value' => $model->citta_nascita,
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

                <?php echo $form->error($model,'citta_nascita'); ?>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'cf'); ?> span5">
            <?php echo $form->labelEx($model,'cf'); ?>
            <div class="input">
                <?php echo $form->textField($model,'cf',array('size'=>20,'maxlength'=>16)); ?>
                <button class="btn btn-mini" id="btnCalcolaCf">Calcola</button>
                <?php echo $form->error($model,'cf'); ?>
            </div>

        </div>


    </div>

    <div class="row">
        <div class="<?php echo $form->fieldClass($model, 'indirizzo'); ?> span1">
            <?php echo $form->labelEx($model,'indirizzo'); ?>
            <div class="input">
                <?php echo $form->textField($model,'indirizzo',array('size'=>80,'maxlength'=>250)); ?>
                <?php echo $form->error($model,'indirizzo'); ?>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'citta'); ?> span5">
            <?php echo $form->labelEx($model,'citta'); ?>
            <div class="input">
                <?php echo $form->textField($model,'citta',array('size'=>40,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'citta'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'provincia'); ?> span2">
            <?php echo $form->labelEx($model,'provincia'); ?>
            <div class="input">
                <?php echo $form->textField($model,'provincia',array('size'=>2,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'provincia'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'cap'); ?> span1">
            <?php echo $form->labelEx($model,'cap'); ?>
            <div class="input">
                <?php echo $form->textField($model,'cap',array('size'=>2,'maxlength'=>10)); ?>
                <?php echo $form->error($model,'cap'); ?>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'telefono'); ?> span4">
            <?php echo $form->labelEx($model,'telefono'); ?>
            <div class="input">
                <?php echo $form->textField($model,'telefono',array('size'=>30,'maxlength'=>30)); ?>
                <?php echo $form->error($model,'telefono'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'email'); ?> span4">
            <?php echo $form->labelEx($model,'email'); ?>
            <div class="input">
                <?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
        </div>

    </div>

    <div class="actions">
        <br/>
        <?php echo BHtml::submitButton('Avanti'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

    function AbilitaPulsanteCf (){
        var valid =  $("#Paziente_nome").val()!="" &&
                     $("#Paziente_cognome").val()!="" &&
                     $("#Paziente_data_nascita").val()!="" &&
                     $("#cod_istat").val()!="";
        $("#btnCalcolaCf").toggle(valid);
    }

    $("#Paziente_nome, #Paziente_cognome, #data_nascita, #paziente_citta_nascita").blur(AbilitaPulsanteCf)

    $("#btnCalcolaCf").click(function(){

        var date =  $("#Paziente_data_nascita").val().ToDate(),
            day  = date.getDate(),
            month = date.getMonth() + 1,
            year =  date.getFullYear().toString();

        $("#Paziente_cf").val(
                CalcolaCodiceFiscale ( $("#Paziente_cognome").val() ,$("#Paziente_nome").val(), day, parseInt(year.substr(0,2)),parseInt(year.substr(2,2)),month, $("#cod_istat").val(),$("#Paziente_sesso").val())
        );

    });

    $(function() { AbilitaPulsanteCf();});




</script>


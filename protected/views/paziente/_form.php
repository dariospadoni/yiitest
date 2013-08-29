<link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fileupload-ui.css" />
<link  rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/overcast/jquery-ui.min.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" ></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-ui-i18n.js" > </script>
<style>
    .form-horizontal .control-label { float:none; width:auto; text-align: left;}
    [class*="span"] { margin-left:0;}
    input,textarea { width:auto; }
</style>

<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'paziente-form',
	'enableAjaxValidation'=>true,
)); ?>

    <?php $this->widget('BAlert',array(
        'content'=>'<p>I campi contrassegnati da <span class="required">*</span> sono obbligatori.</p>'
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
    </div>

    <div class="row">
        <div class="<?php echo $form->fieldClass($model, 'data_nascita'); ?> span2">
            <?php echo $form->labelEx($model,'data_nascita'); ?>
            <div class="input">
                <?php echo $form->textField($model,'data_nascita',array('size'=>10,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'data_nascita'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'citta_nascita'); ?> span4">
            <?php echo $form->labelEx($model,'citta_nascita'); ?>
            <div class="input">
                <?php echo $form->textField($model,'citta_nascita',array('size'=>30,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'citta_nascita'); ?>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'cf'); ?> span3">
            <?php echo $form->labelEx($model,'cf'); ?>
            <div class="input">
                <?php echo $form->textField($model,'cf',array('size'=>20,'maxlength'=>16)); ?>
                <?php echo $form->error($model,'cf'); ?>
<!--                <button id="btnCalcolaCodFisc" class="btn btn-info btn-small" type="button">Calcola</button>-->
            </div>

        </div>

        <div class="<?php echo $form->fieldClass($model, 'codice_sanitario'); ?> span3">
            <?php echo $form->labelEx($model,'codice_sanitario'); ?>
            <div class="input">
                <?php echo $form->textField($model,'codice_sanitario',array('size'=>20,'maxlength'=>20)); ?>
                <?php echo $form->error($model,'codice_sanitario'); ?>
                <!--                <button id="btnCalcolaCodFisc" class="btn btn-info btn-small" type="button">Calcola</button>-->
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


	<div class="<?php echo $form->fieldClass($model, 'note'); ?>">
		<?php echo $form->labelEx($model,'note'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>100)); ?>
			<?php echo $form->error($model,'note'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crea' : 'Salva'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<script type="text/javascript">

    $(function(){

        $("#Paziente_data_nascita").datepicker();
    }) ;
</script>
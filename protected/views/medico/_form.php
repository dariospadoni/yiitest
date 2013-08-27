<link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fileupload-ui.css" />




<style>
    .form-horizontal .control-label { float:none; width:auto; text-align: left;}
    [class*="span"] { margin-left:0;}
    #fileupload { height:110px;}/*alta quanto l'immagine di preview */
</style>


<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'medico-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php
    Yii::import('ext.yii-redactor.ERedactorWidget');
?>

	<?php $this->widget('BAlert',array(
		'content'=>'<p>I campi contrassegnati da <span class="required">*</span> sono obbligatori.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

    <?php if  ( ! $model->isNewRecord() ) { ?>
        <?php echo $form->hiddenField($model,'medico[id_medico]'); ?>
    <?php } ?>

    <div class="row">

            <div class="<?php echo $form->fieldClass($model, 'nome'); ?> span3">
                <?php echo $form->labelEx($model,'nome'); ?>
                <div class="input">
                    <?php echo $form->textField($model,'nome'); ?>
                    <?php echo $form->error($model,'nome'); ?>
                </div>
            </div>

            <div class="<?php echo $form->fieldClass($model, 'cognome'); ?> span3">
                <?php echo $form->labelEx($model,'cognome'); ?>
                <div class="input">
                    <?php echo $form->textField($model,'cognome'); ?>
                    <?php echo $form->error($model,'cognome'); ?>
                </div>
            </div>


            <div class="<?php echo $form->fieldClass($model, 'email'); ?> span3">
                <?php echo $form->labelEx($model,'email'); ?>
                <div class="input">
                    <?php echo $form->textField($model,'email'); ?>
                    <?php echo $form->error($model,'email'); ?>
                </div>
            </div>

            <?php if ($model->isNewRecord() ) { ?>

                <div class="<?php echo $form->fieldClass($model, 'password'); ?> span2">
                    <?php echo $form->labelEx($model,'password'); ?>
                    <div class="input">
                        <?php echo $form->textField($model,'password'); ?>
                        <?php echo $form->error($model,'password'); ?>
                    </div>
                </div>

            <?php } ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'Foto'); ?>
        <span class="span2 btn fileinput-button">
            <span id="userImagePreview" >
                <?php if ($model->isNewRecord() || $model->getImageData()=="" ) { ?>
                    <img  width="100" src="<?php echo Yii::app()->request->baseUrl; ?>/images/user.jpg" alt="foto medico"/>
                <?php } else { ?>
                    <img src="data:image/gif;base64,<?php echo $model->getImageData(); ?>"  alt="foto medico"/>
                <?php  } ?>
            </span>
            <?php echo $form->hiddenField($model,'medico[foto]', array('id'=>'hdnFotoMedico')); ?>
            <input id="fileupload" type="file" name="files[]"  />
     </span>
    </div>
<br/>

    <div class="<?php echo $form->fieldClass($model, 'medico[specializzazione]'); ?>">
		<?php echo $form->labelEx($model,'Specializzazione'); ?>
		<div class="input">
			<?php echo $form->textField($model,'medico[specializzazione]'); ?>
			<?php echo $form->error($model,'medico[specializzazione]'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'medico[formazione]'); ?>">
		<?php echo $form->labelEx($model,'Formazione'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'medico[formazione]',array('rows'=>6, 'cols'=>50, 'class'=>'textarea')); ?>
			<?php echo $form->error($model,'medico[formazione]'); ?>
		</div>
	</div>

    <div class="<?php echo $form->fieldClass($model, 'medico[esperienze_precedenti]'); ?>">
        <?php echo $form->labelEx($model,'Esperienze precedenti'); ?>
        <div class="input">
            <?php echo $form->textArea($model,'medico[esperienze_precedenti]',array('rows'=>6, 'cols'=>50, 'class'=>'textarea')); ?>
            <?php echo $form->error($model,'medico[esperienze_precedenti]'); ?>
        </div>
    </div>

    <div class="<?php echo $form->fieldClass($model, 'medico[attivita_accedemica]'); ?>">
        <?php echo $form->labelEx($model,'Attività accademica'); ?>
        <div class="input">
            <?php echo $form->textArea($model,'medico[attivita_accedemica]',array('rows'=>6, 'cols'=>50, 'class'=>'textarea')); ?>
            <?php echo $form->error($model,'medico[attivita_accedemica]'); ?>
        </div>
    </div>

    <div class="<?php echo $form->fieldClass($model, 'medico[attivita_scientifica]'); ?>">
        <?php echo $form->labelEx($model,'Attività scientifica'); ?>
        <div class="input">
            <?php echo $form->textArea($model,'medico[attivita_scientifica]',array('rows'=>6, 'cols'=>50, 'class'=>'textarea')); ?>
            <?php echo $form->error($model,'medico[attivita_scientifica]'); ?>
        </div>
    </div>

    <div class="<?php echo $form->fieldClass($model, 'medico[pubblicazioni]'); ?>">
        <?php echo $form->labelEx($model,'Pubblicazioni'); ?>


        <div class="input">
            <?php echo $form->textArea($model,'medico[pubblicazioni]',array('rows'=>6, 'cols'=>50, 'class'=>'textarea')); ?>
            <?php echo $form->error($model,'medico[pubblicazioni]'); ?>
        </div>
    </div>



    <div class="actions">
        <?php echo BHtml::submitButton($model->isNewRecord() ? 'Crea' : 'Salva'); ?>
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

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.ui.widget.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/load-image.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.iframe-transport.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.fileupload.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.fileupload-process.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.fileupload-image.js"></script>



<style>
    #allegato-prestazione-Create-form {display:none;}
</style>

<script>

    $(function () {

        $("#btnAddAllegato").click(function(){ $("#allegato-prestazione-Create-form").show(); $("#btnAddAllegato").hide(); });

        $("#AllegatoDto_nome").blur(function(){
            $(".btn-upload").prop('disabled', $("#AllegatoDto_nome").val()=="");
        });


        $('#fileupload').fileupload({
            url:"<?php echo Yii::app()->request->baseUrl; ?>"+"/php/fileUpload/index.php?upload_dir=tmp",
            dataType: 'json',
            autoUpload: true,
            maxFileSize: 500000, // 500KB
            previewMaxWidth: 100,
            previewMaxHeight: 100,
            previewCrop: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        }).on('fileuploadprocessalways', function (e, data) {
            var index = data.index,
                file = data.files[index],
                node = $('#userImagePreview');

            if (file.preview) {
                node.html(file.preview);
            }
            if (file.error) {
                node
                    .append('<br>')
                    .append(file.error);
            }
        }).on('fileuploaddone',function(e,data){
                $("#hdnFotoMedico").val(data.result.files[0].url);
        })
        .on('fileuploadfail', function (e, data) {
            if (data.errorThrown=="abort")
            {
                console.log("upload aborted by the user");
                return;
            }
            $.each(data.result.files, function (index, file) {
                var error = $('<span/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            });
        }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>

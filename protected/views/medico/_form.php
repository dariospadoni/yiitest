<style>
    .form-horizontal .control-label { float:none; width:auto; text-align: left;}
    [class*="span"] { margin-left:0;}
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

            <div class="<?php echo $form->fieldClass($model, 'password'); ?> span2">
                <?php echo $form->labelEx($model,'password'); ?>
                <div class="input">
                    <?php echo $form->textField($model,'password'); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div>
            </div>


    </div>



    <div class="<?php echo $form->fieldClass($model, 'medico[specializzazione]'); ?>">
		<?php echo $form->labelEx($model,'Specializzazione'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'medico[specializzazione]',array('rows'=>6, 'cols'=>50, 'class'=>'textarea')); ?>
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


    <div class="row">
        <?php echo $form->hiddenField($model,'medico[foto]' ); ?>
        <?php echo $form->fileField($model,'medico[foto]', array('id'=>'fileupload', 'name'=>'files[]')); ?>
    </div>


    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="bar"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>



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
    //'model'=>$model,
     'selector'=>'.textarea'
));

?>



<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.ui.widget.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.iframe-transport.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.fileupload.js"></script>

<style>
    #allegato-prestazione-Create-form {display:none;}
    #progress{display:none;}
</style>

<script>

    $(function () {

        $("#btnAddAllegato").click(function(){ $("#allegato-prestazione-Create-form").show(); $("#btnAddAllegato").hide(); });

        $("#AllegatoDto_nome").blur(function(){
            $(".btn-upload").prop('disabled', $("#AllegatoDto_nome").val()=="");
        });

        var uploadButton = $('<button/>')
            .addClass('btn btn-primary btn-upload')
            .prop('disabled', false)
            .text('Salva')
            .on('click', function () {

                var $this = $(this),
                    data = $this.data();
                data.submit().success(function(result, textStatus, jqXHR){
                    console.log("submit success");
                    $("#progress").hide();
                    $("#files").empty();

                });
                $('#progress').show();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        console.log("abort");
                        $this.remove();
                        data.abort();
                    });
                return false;
            });

        $('#fileupload').fileupload({
            url:"<?php echo Yii::app()->request->baseUrl; ?>"+"/php/fileUpload/index.php",
            dataType: 'json',
            autoUpload: false,
            maxFileSize: 500000, // 500KB
            previewMaxWidth: 100,
            previewMaxHeight: 100,
            previewCrop: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).on('fileuploadadd', function (e, data) {
                data.context = $('<div/>').appendTo('#files');
                $.each(data.files, function (index, file) {
                    var node = $('<p/>')
                        .append($('<span/>').text(file.name));
                    if (!index) {
                        node
                            .append('<br>')
                            .append(uploadButton.clone(true).data(data));
                    }
                    node.appendTo(data.context);
                });
            }).on('fileuploadprocessalways', function (e, data) {
                var index = data.index,
                    file = data.files[index],
                    node = $(data.context.children()[index]);
                if (file.preview) {
                    node
                        .prepend('<br>')
                        .prepend(file.preview);
                }
                if (file.error) {
                    node
                        .append('<br>')
                        .append(file.error);
                }
                if (index + 1 === data.files.length) {
                    data.context.find('button')
                        .text('Upload')
                        .prop('disabled', !!data.files.error);
                }
            }).on('fileuploadfail', function (e, data) {
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

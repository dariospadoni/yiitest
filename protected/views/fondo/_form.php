<link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fileupload-ui.css" />

<style>
    .form-horizontal .control-label { float:none; width:auto; text-align: left;}
    [class*="span"] { margin-left:0;}
    #fileupload { height:110px;}/*alta quanto l'immagine di preview */
    input, textarea { width:auto; }
</style>


<?php
Yii::import('ext.yii-redactor.ERedactorWidget');
?>

<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'fondo-form',
	'enableAjaxValidation'=>false,
)); ?>


    <?php $this->widget('BAlert',array( 'content'=>'<p>I campi contrassegnati da <span class="required">*</span> sono obbligatori.</p>' )); ?>


    <?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'nome'); ?>">
		<?php echo $form->labelEx($model,'nome'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nome',array('size'=>90,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'nome'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'descrizione'); ?>">
		<?php echo $form->labelEx($model,'descrizione'); ?>
		<div class="input">
			<?php echo $form->textArea($model,'descrizione',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'descrizione'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'sito_web'); ?>">
		<?php echo $form->labelEx($model,'sito_web'); ?>
		<div class="input">
			<?php echo $form->textField($model,'sito_web',array('size'=>90,'maxlength'=>256)); ?>
			<?php echo $form->error($model,'sito_web'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'logo'); ?>">
        <?php echo $form->labelEx($model,'logo'); ?>
		<span class="btn fileinput-button span2">
            <span id="logoPreview" >
                <?php if ($model->isNewRecord() || $model->getImageData()=="" ) { ?>
                    <img  width="100" src="<?php echo Yii::app()->request->baseUrl; ?>/images/user.jpg" alt="logo fondo"/>
                <?php } else { ?>
                    <img src="data:image/gif;base64,<?php echo $model->getImageData(); ?>"  alt="logo fondo"/>
                <?php  } ?>
            </span>
            <?php echo $form->hiddenField($model, 'logo', array('id'=>'hdnLogoFondo')); ?>
            <input id="fileupload" type="file" name="files[]"  />
     </span>
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

    'selector'=>'textarea'
));
?>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.ui.widget.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/load-image.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.iframe-transport.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.fileupload.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.fileupload-process.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/uploader/jquery.fileupload-image.js"></script>




<script>

    $(function () {

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
                    node = $('#logoPreview');

                if (file.preview) {
                    node.html(file.preview);
                }
                if (file.error) {
                    node
                        .append('<br>')
                        .append(file.error);
                }
            }).on('fileuploaddone',function(e,data){
                $("#hdnLogoFondo").val(data.result.files[0].url);
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

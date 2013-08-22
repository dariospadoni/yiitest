 <?php
/* @var $this AllegatoPrestazioneController */
/* @var $model AllegatoPrestazione */
/* @var $form CActiveForm */
?>

<button id="btnAddAllegato" >Aggiungi allegato</button>

<div class="form">



    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'allegato-prestazione-Create-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        //'enableAjaxValidation'=>true,
        //'action'=>Yii::app()->createUrl('/prestazione/update/'.$model->id_prestazione),
        'enableClientValidation'=>true,
        'clientOptions'=>array('validateOnSubmit'=>false),
        //'focus'=>array($model,'nome'),
    )); ?>

    <h3> Nuovo allegato </h3>


    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'nome'); ?>
        <?php echo $form->textField($model,'nome'); ?>
        <?php echo $form->error($model,'nome'); ?>
    </div>

    <div class="row">
        <?php echo $form->hiddenField($model,'url' ); ?>
        <?php echo $form->fileField($model,'url', array('id'=>'fileupload', 'name'=>'files[]')); ?>
    </div>


    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="bar"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>


    <?php $this->endWidget(); ?>

</div>
 <!-- form -->

<!-- <link  rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/bootstrap.min.css" />-->

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
                     $("#AllegatoDto_url").val(result.files[0].name);
                     $("#allegato-prestazione-Create-form").submit();
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
             progressall: function (e, data) {
                 var progress = parseInt(data.loaded / data.total * 100, 10);
                 $('#progress .bar').css(
                     'width',
                     progress + '%'
                 );
             }
         }).on('fileuploadadd', function (e, data) {
                 $("#files").empty();
                 $("#fileupload").hide();
                 data.context = $('<div/>').appendTo('#files');
                 var node = $('<p/>').text( data.files[0].name);
                 node.append("<br/>").append(uploadButton.clone(true).data(data));
                 node.appendTo(data.context);
                 $("#AllegatoDto_nome").blur();
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

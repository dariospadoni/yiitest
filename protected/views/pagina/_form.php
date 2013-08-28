<div class="form">

<?php
Yii::import('ext.yii-redactor.ERedactorWidget');
?>

<style>
    .form-horizontal .control-label { text-align: left; width:80px;}
</style>

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'pagina-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>I campi contrassegnati da <span class="required">*</span> sono obbligatori.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'nome'); ?>">
		<?php echo $form->labelEx($model,'nome'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nome',array('size'=>100,'maxlength'=>200,'style'=>'width:500px')); ?>
			<?php echo $form->error($model,'nome'); ?>
		</div>
	</div>

    <div class="<?php echo $form->fieldClass($model, 'area_sito'); ?>">
        <?php echo $form->labelEx($model,'area_sito'); ?>
        <div class="input">
            <?php echo $form->dropDownList($model,'area_sito',array("presentazione"=>"Presentazione","info"=>"Info Utili")); ?>
            <?php echo $form->error($model,'area_sito'); ?>
        </div>
    </div>

	<div class="<?php echo $form->fieldClass($model, 'contenuto'); ?>">
		<?php echo $form->labelEx($model,'contenuto'); ?>
        <br/><br/>
		<div class="input">
            <?php
            $this->widget('ERedactorWidget',array(
                'options' => array(
                    'lang' => 'it',
                    'minHeight'=>400,
                    'fileUpload'=>Yii::app()->createUrl('pagina/fileUpload',array(
                        'attr'=>'pagine'
                    )),
                    'fileUploadErrorCallback'=>new CJavaScriptExpression(
                        'function(obj,json) { alert(json.error); }'
                    ),
                    'imageUpload'=>Yii::app()->createUrl('pagina/imageUpload',array(
                        'attr'=>'pagine'
                    )),
                    'imageGetJson'=>Yii::app()->createUrl('pagina/imageList',array(
                        'attr'=>'pagine'
                    )),
                    'imageUploadErrorCallback'=>new CJavaScriptExpression(
                        'function(obj,json) { alert(json.error); }'
                    )
                ),
                'model'=>$model,
                'attribute'=>'contenuto'
            ));

            ?>

<!--            --><?php //echo $form->textArea($model,'contenuto',array('rows'=>20, 'cols'=>50)); ?>

            <?php echo $form->error($model,'contenuto'); ?>
		</div>
	</div>




	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crea' : 'Salva'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
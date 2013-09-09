<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'feedback-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

        'content'=>'<p>I campi contrassegnati da <span class="required">*</span> sono obbligatori.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'cognome'); ?> span5">
            <?php echo $form->labelEx($model,'cognome'); ?>
            <div class="input">
                <?php echo $form->textField($model,'cognome',array('size'=>30,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'cognome'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'nome'); ?> span5">
            <?php echo $form->labelEx($model,'nome'); ?>
            <div class="input">
                <?php echo $form->textField($model,'nome',array('size'=>30,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'nome'); ?>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'email'); ?> span5">
            <?php echo $form->labelEx($model,'email'); ?>
            <div class="input">
                <?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>200)); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'cf'); ?> span6">
            <?php echo $form->labelEx($model,'cf'); ?>
            <div class="input">
                <?php echo $form->textField($model,'cf',array('size'=>18,'maxlength'=>16)); ?>
                <?php echo $form->error($model,'cf'); ?>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'id_fondo'); ?> span5">
            <?php echo $form->labelEx($model,'Fondo'); ?>
            <div class="input">
                <?php echo $form->dropDownList($model,'id_fondo', CHtml::listData( Fondo::model()->findAll(), 'id_fondo', 'nome'),array('prompt'=>'Seleziona')  ); ?>
                <?php echo $form->error($model,'id_fondo'); ?>
            </div>
        </div>

        <div class="<?php echo $form->fieldClass($model, 'id_prestazione'); ?> span5">
            <?php echo $form->labelEx($model,'Prestazione'); ?>
            <div class="input">
                <?php echo $form->dropDownList($model,'id_prestazione', CHtml::listData( Prestazione::model()->findAll(), 'id_prestazione', 'nome')  ); ?>
                <?php echo $form->error($model,'id_prestazione'); ?>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'data_visita'); ?> span12">
            <?php echo $form->labelEx($model,'data_visita'); ?>
            <div class="input">
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'value'=>$model->data_visita,
                    'name'=>'Feedback[data_visita]',
                    'language' => 'it',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'showOn' => 'button',
                        'maxDate' => 'new Date()',
                    ),
                    'htmlOptions'=>array(
                        'size'=>10
                    ),
                ));
                ?>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="<?php echo $form->fieldClass($model, 'commento'); ?> span12">
            <?php echo $form->label($model,'commento'); ?>
            <div class="input">
                <?php echo $form->textArea($model,'commento',array('rows'=>6, 'cols'=>120)); ?>
                <?php echo $form->error($model,'commento'); ?>
            </div>
        </div>

    </div>

    <div class="clearfix"></div>

    <div class="row actions">
        <br/>
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Invia' : 'Modifica'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
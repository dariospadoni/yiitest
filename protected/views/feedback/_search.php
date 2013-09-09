<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="clearfix">
		<?php echo $form->label($model,'cognome'); ?>
		<div class="input">
			<?php echo $form->textField($model,'cognome'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'cf'); ?>
		<div class="input">
			<?php echo $form->textField($model,'cf'); ?>
		</div>
	</div>

    <div class="clearfix">
        <?php echo $form->label($model,'Prestazione'); ?>
        <div class="input">
            <?php echo $form->ListBox   ($model,'id_prestazione', CHtml::listData( Prestazione::model()->findAll(), 'id_prestazione', 'nome'),array('multiple' => 'true' )   ); ?>
        </div>
    </div>

    <div class="clearfix">
        <?php echo $form->label($model,'Fondo'); ?>
        <div class="input">
            <?php echo $form->ListBox   ($model,'id_fondo', CHtml::listData( Fondo::model()->findAll(), 'id_fondo', 'nome'),array('multiple' => 'true' )   ); ?>
        </div>
    </div>


    <div class="clearfix">
        <?php echo $form->label($model,'data_visita'); ?>
        <div class="input">
            <div class="input">
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'value'=>$model->data_visita,
                    'name'=>'Prenotazione[data_visita]',
                    'language' => 'it',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'showOn' => 'button'
                    ),
                    'htmlOptions'=>array(
                        'size'=>10
                    ),
                ));
                ?>
            </div>
        </div>
    </div>



    <div class="actions">
        <br/>
        <?php echo BHtml::submitButton('Filtra'); ?>
        <?php echo BHtml::submitButton('Azzera', array('id'=>'form-prenotazioni-reset-button','class'=>'btn')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->


<script type="text/javascript">

    $(function(){
        $('#form-prenotazioni-reset-button').click(function()
        {
            $('#prenotazioni-search-form  input:text').each(function(i, o)
            {
                $(o).val('');
            });
            $('select option').each(function(i, e)
            {
                e.selected = false
            });


        });
    });

</script>
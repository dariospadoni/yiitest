<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'id'=>'pazienti-search-form',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'cf'); ?>
		<div class="input">
			<?php echo $form->textField($model,'cf',array('size'=>16,'maxlength'=>16)); ?>
		</div>
	</div>

    <div class="clearfix">
        <?php echo $form->label($model,'codice_sanitario'); ?>
        <div class="input">
            <?php echo $form->textField($model,'codice_sanitario',array('size'=>20,'maxlength'=>20)); ?>
        </div>
    </div>

	<div class="clearfix">
		<?php echo $form->label($model,'cognome'); ?>
		<div class="input">
			<?php echo $form->textField($model,'cognome',array('size'=>20,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'note'); ?>
		<div class="input">
			<?php echo $form->textField($model,'note' ); ?>
		</div>
	</div>

	<div class="actions">
        <br/>
		<?php echo BHtml::submitButton('Cerca'); ?>
        <?php echo BHtml::submitButton('Azzera', array('id'=>'form-reset-button','class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->


<script type="text/javascript">

    $(function(){
        $('#form-reset-button').click(function()
        {
            $('#pazienti-search-form  input:text').each(function(i, o)
            {
                $(o).val('');
            });

        });
    });

</script>
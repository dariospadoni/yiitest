<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'id'=>'prenotazioni-search-form',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'prestazione'); ?>
		<div class="input">
            <?php echo $form->ListBox   ($model,'id_prestazione', CHtml::listData( Prestazione::model()->findAll(), 'id_prestazione', 'nome'),array('multiple' => 'true' )   ); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'cognome_paziente'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nomePaziente'); ?>
		</div>
	</div>

	<div class="actions">
        <br/>
		<?php echo BHtml::submitButton('Filtra', array('id'=>'search-calendar-btn')); ?>
        <?php echo BHtml::submitButton('Azzera', array('id'=>'form-prenotazioni-reset-button','class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->


<script type="text/javascript">

    $(function(){

        $("#search-calendar-btn").click(function(){

            $("#calendar").fullCalendar( 'refetchEvents' );
            return false;
        });

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
            $("#calendar").fullCalendar( 'refetchEvents' );
        });
    });

</script>
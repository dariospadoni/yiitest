<style>
    [class*="span"] {margin-left:0;}

</style>
<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl("medico/search"),
	'method'=>'get',
    'id'=>'medici-search-form'
)); ?>

	<div class="row">
        <div class="span3">
            <?php echo $form->label($model,'Nome'); ?>
            <div class="input">
                <?php echo $form->textField($model,'nome'); ?>
            </div>
	    </div>

        <div class="span3">
            <?php echo $form->label($model,'cognome'); ?>
            <div class="input">
                <?php echo $form->textField($model,'cognome'); ?>
            </div>
	    </div>

        <div class="span2">
            <?php echo $form->label($model,'specializzazione'); ?>
            <div class="input">
                <?php echo $form->dropDownList($model, 'medico[specializzazione]', CHtml::listData( $specializzazioni, 'specializzazione', 'specializzazione'), array( 'empty'=>"Scegli...")); ?>
            </div>
        </div>
    </div>
<br/>
	<div class="actions">
		<?php echo BHtml::submitButton('Cerca'); ?>
        <?php echo BHtml::submitButton('Azzera', array('id'=>'form-reset-button','class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->

<script type="text/javascript">

    $(function(){
        $('#form-reset-button').click(function()
        {
            $('#medici-search-form  input:text, #medici-search-form select').each(function(i, o)
            {
                $(o).val('');
            });
            //return false;
        });

    });

</script>
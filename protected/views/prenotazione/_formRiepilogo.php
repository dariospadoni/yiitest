

<div class="form">

    <?php $form=$this->beginWidget('BActiveForm', array(
        'id'=>'prenotazione-form',
        'enableAjaxValidation'=>false,
    )); ?>

<!--    <input type="hidden" name="confirm"-->
    <b>Fondo:</b>
    <?php echo CHtml::encode( Fondo::model()->findByPk($model->id_fondo )->nome); ?>
    <br />

    <b>Prestazione:</b>
    <?php echo CHtml::encode( Prestazione::model()->findByPk($model->id_prestazione)->nome); ?>
    <br />

    <h3> Dati paziente </h3>

    <div class="view">

        <?php
            $paziente = $_SESSION["paziente"];
        ?>

        <b><?php echo CHtml::encode(Paziente::model()->getAttributeLabel('cf')); ?>:</b>
        <?php echo CHtml::encode($paziente['cf']); ?>
        <br />

        <b><?php echo CHtml::encode(Paziente::model()->getAttributeLabel('nome')); ?>:</b>
        <?php echo CHtml::encode($paziente['nome']); ?>
        <br />

        <b><?php echo CHtml::encode(Paziente::model()->getAttributeLabel('cognome')); ?>:</b>
        <?php echo CHtml::encode($paziente["cognome"]); ?>
        <br />

        <b><?php echo CHtml::encode(Paziente::model()->getAttributeLabel('indirizzo')); ?>:</b>
        <?php echo CHtml::encode($paziente["indirizzo"]); ?>
        <br />

        <b><?php echo CHtml::encode(Paziente::model()->getAttributeLabel('citta')); ?>:</b>
        <?php echo CHtml::encode($paziente["citta"]); ?>
        <br />

        <b><?php echo CHtml::encode(Paziente::model()->getAttributeLabel('cap')); ?>:</b>
        <?php echo CHtml::encode($paziente["cap"]); ?>
        <br />

        <div class="actions">
            <?php echo BHtml::submitButton( 'Conferma' , array('name'=>"confirm")); ?>
        </div>

    </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->
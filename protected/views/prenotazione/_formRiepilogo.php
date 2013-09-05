
<style>
     .col120 {width:120px; font-weight: bold;display: inline-block;}
</style>

<div class="form">

    <?php $form=$this->beginWidget('BActiveForm', array(
        'id'=>'prenotazione-form',
        'enableAjaxValidation'=>false,
    )); ?>


    <h2> Riepilogo prenotazione </h2>

    <h3> Dati paziente </h3>

    <div class="view">

        <?php
        $paziente = $_SESSION["paziente"];
        ?>

        <div class="row">
            <div class="span5">
                <label class='col120'> Nominativo </label>
                <?php echo CHtml::encode($paziente['nome'] . " " . $paziente['cognome']) ; ?>
            </div>
            <div class="span5">
                <label class='col120'><?php echo CHtml::encode(Paziente::model()->getAttributeLabel('cf')); ?> </label>
                <?php echo CHtml::encode($paziente['cf']  ) ; ?>
            </div>
        </div>

        <div class="row">
            <div class="span5">
                <label class='col120'> <?php echo CHtml::encode(Paziente::model()->getAttributeLabel('telefono')); ?> </label>
                <?php echo CHtml::encode($paziente['telefono'] ) ; ?>
            </div>

            <div class="span5">
                <label class='col120'> <?php echo CHtml::encode(Paziente::model()->getAttributeLabel('email')); ?> </label>
                <?php echo CHtml::encode($paziente['email'] ) ; ?>
            </div>
        </div>

        <div class="row">
            <div class="span5">
                <label class='col120'> <?php echo CHtml::encode(Paziente::model()->getAttributeLabel('data_nascita')); ?> </label>
                <?php echo CHtml::encode($paziente['data_nascita'] ) ; ?>
            </div>

            <div class="span5   ">
                <label class='col120'> <?php echo CHtml::encode(Paziente::model()->getAttributeLabel('citta_nascita')); ?> </label>
                <?php echo CHtml::encode($paziente['citta_nascita'] ) ; ?>
            </div>
        </div>

        <div class="row">
            <div class="span12">
                <label class='col120'> <?php echo CHtml::encode(Paziente::model()->getAttributeLabel('indirizzo')); ?> </label>
                <?php echo CHtml::encode($paziente['indirizzo'] ) ; ?>
            </div>
        </div>

        <div class="row">
            <div class="span5">
                <label class='col120'> <?php echo CHtml::encode(Paziente::model()->getAttributeLabel('citta')); ?> </label>
                <?php echo CHtml::encode($paziente['citta'] ) ; ?>
            </div>

            <div class="span3">
                <label class='col120'> <?php echo CHtml::encode(Paziente::model()->getAttributeLabel('provincia')); ?> </label>
                <?php echo CHtml::encode($paziente['provincia'] ) ; ?>
            </div>
            <div class="span3">
                <label class='col120'> <?php echo CHtml::encode(Paziente::model()->getAttributeLabel('cap')); ?> </label>
                <?php echo CHtml::encode($paziente['cap'] ) ; ?>
            </div>
        </div>
 
    </div>


    <h3> Dati prestazione </h3>

    <div class="row">

        <div class="span5">
            <label class='col120'>Fondo:</label>
            <?php echo CHtml::encode( Fondo::model()->findByPk($model->id_fondo )->nome); ?>
        </div>

        <div class="span5">
            <label class='col120'>Prestazione:</label>
            <?php echo CHtml::encode( Prestazione::model()->findByPk($model->id_prestazione)->nome); ?>
        </div>

    </div>



    <div class="actions">
        <?php echo BHtml::submitButton( 'Conferma' , array('name'=>"confirm")); ?>
    </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->
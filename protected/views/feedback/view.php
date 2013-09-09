
<style>
    .col120 {width:120px; font-weight: bold;display: inline-block;}
</style>

<?php
$this->pageCaption='View Feedback #'.$model->id_feedback;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	$model->id_feedback,
);

$this->menu=array(
	array('label'=>'Lista feedback', 'url'=>array('index')),
	//array('label'=>'Update Feedback', 'url'=>array('update','id'=>$model->id_feedback)),
	array('label'=>'Elimina feedback', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_feedback),'confirm'=>'Sei sicuro di voler eliminare questo feedback?')),
);
?>


<div class="row">
    <div class="span4">
        <label class='col120'> Nominativo </label>
        <?php echo CHtml::encode($model->cognome . " " . $model->nome) ; ?>
    </div>
    <div class="span4">
        <label class='col120'><?php echo CHtml::encode(Paziente::model()->getAttributeLabel('email')); ?> </label>
        <?php echo CHtml::encode($model->email  ) ; ?>
    </div>
</div>

<div class="row">
    <div class="span4">
        <label class='col120'> Cod.Fiscale </label>
        <?php echo CHtml::encode($model->cf ) ; ?>
    </div>
    <div class="span4">
        <label class='col120'> Data visita </label>

        <?php
            if(strtotime( $model->data_visita ))
                echo CHtml::encode(  date ( "d/m/Y", strtotime($model->data_visita)  )) ; ?>
    </div>
</div>

<div class="row">
    <div class="span4">
        <label class='col120'>Fondo:</label>
        <?php echo CHtml::encode( Fondo::model()->findByPk($model->id_fondo )->nome); ?>
    </div>

    <div class="span4">
        <label class='col120'>Prestazione:</label>
        <?php echo CHtml::encode( Prestazione::model()->findByPk($model->id_prestazione)->nome); ?>
    </div>
</div>

<div class="row">
    <div class="span10">
        <label class='col120'>Commento:</label><br/>
        <?php echo CHtml::encode($model->commento) ; ?>
    </div>


</div>

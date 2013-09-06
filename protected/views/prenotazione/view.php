<?php
$this->pageCaption='Visualizza prenotazione #'.$model->id_prenotazione;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Prenotazioni'=>array('index'),
	$model->id_prenotazione,
);

$this->menu=array(
	array('label'=>'Elenco prenotazioni', 'url'=>array('index')),
	array('label'=>'Nuova prenotazione', 'url'=>array('create')),
	array('label'=>'Modifica prenotazione', 'url'=>array('update', 'id'=>$model->id_prenotazione)),
	array('label'=>'Elimina prenotazione', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_prenotazione),'confirm'=>'Are you sure you want to delete this item?')),
);
?>


<?php
    echo $this->renderPartial('_formRiepilogo', array('paziente'=>$paziente, 'model'=>$model, 'mode'=>'view'));
?>


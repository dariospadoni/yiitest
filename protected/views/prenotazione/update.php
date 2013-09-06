<?php
$this->pageCaption='Modifica prenotazione '.$model->id_prenotazione;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Prenotazioni'=>array('index'),
	$model->id_prenotazione=>array('view','id'=>$model->id_prenotazione),
	'Modifica prenotazione',
);

$this->menu=array(
	array('label'=>'Lista prenotazioni', 'url'=>array('index')),
	array('label'=>'Nuova prenotazione', 'url'=>array('create')),
	array('label'=>'Visualizza prenotazione', 'url'=>array('view', 'id'=>$model->id_prenotazione)),
	array('label'=>'Gestione prenotazioni', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'prestazioni'=>$prestazioni,'paziente'=>$paziente,'mode'=>'update')); ?>
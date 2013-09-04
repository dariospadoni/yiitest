<?php
$this->pageCaption='View Prenotazione #'.$model->id_prenotazione;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Prenotaziones'=>array('index'),
	$model->id_prenotazione,
);

$this->menu=array(
	array('label'=>'List Prenotaziones', 'url'=>array('index')),
	array('label'=>'Create Prenotazione', 'url'=>array('create')),
	array('label'=>'Update Prenotazione', 'url'=>array('update', 'id'=>$model->id_prenotazione)),
	array('label'=>'Delete Prenotazione', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_prenotazione),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prenotaziones', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'id_prenotazione',
		'id_fondo',
		'id_prestazione',
		'id_paziente',
		'data_creazione',
		'data_visita',
		'assegnata',
		'note_paziente',
		'note_gmc',
		'id_user',
	),
)); ?>

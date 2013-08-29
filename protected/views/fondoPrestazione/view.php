<?php
$this->pageCaption='View FondoPrestazione #'.$model->id_fondo_prestazione;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Fondo Prestaziones'=>array('index'),
	$model->id_fondo_prestazione,
);

$this->menu=array(
	array('label'=>'List Fondo Prestaziones', 'url'=>array('index')),
	array('label'=>'Create FondoPrestazione', 'url'=>array('create')),
	array('label'=>'Update FondoPrestazione', 'url'=>array('update', 'id'=>$model->id_fondo_prestazione)),
	array('label'=>'Delete FondoPrestazione', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fondo_prestazione),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fondo Prestaziones', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'id_fondo_prestazione',
		'id_fondo',
		'id_prestazione',
		'prezzo',
	),
)); ?>

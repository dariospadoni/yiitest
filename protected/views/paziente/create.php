<?php
$this->pageCaption='Create Paziente';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new paziente';
$this->breadcrumbs=array(
	'Pazienti'=>array('index'),
	'Nuovo paziente',
);

$this->menu=array(
	//array('label'=>'Elenco  pazienti', 'url'=>array('index')),
	array('label'=>'Gestione pazienti', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
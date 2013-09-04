<?php
$this->pageCaption='Nuova prenotazione';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Prenotazioni'=>array('index'),
	'Nuova prenotazione',
);

$this->menu=array(
	array('label'=>'Lista prenotazioni', 'url'=>array('index')),
	array('label'=>'Gestione prenotazioni', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
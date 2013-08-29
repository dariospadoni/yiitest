<?php
$this->pageCaption='Pazientes';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Elenco pazienti',
);

$this->menu=array(
	array('label'=>'Nuovo paziente', 'url'=>array('create')),
	array('label'=>'Gestione pazienti', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

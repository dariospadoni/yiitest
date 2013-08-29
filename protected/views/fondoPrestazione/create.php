<?php
$this->pageCaption='Create FondoPrestazione';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new fondoprestazione';
$this->breadcrumbs=array(
	'Fondo Prestaziones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fondo Prestaziones', 'url'=>array('index')),
	array('label'=>'Manage Fondo Prestaziones', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
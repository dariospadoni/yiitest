<?php
$this->pageTitle=Yii::app()->name . ' - Errore';
$this->pageCaption = 'Errore';
$this->pageDescription = $code;
$this->breadcrumbs=array(
	'Errore',
);
?>

<?php $this->widget('BAlert',array(
	'content'=>CHtml::encode($message),
	'type'=>'error',
	'isBlock'=>true,
	'canClose'=>false,
)); ?>
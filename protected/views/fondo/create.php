<?php
$this->pageCaption='Create Fondo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new fondo';
$this->breadcrumbs=array(
	'Fondi'=>array('index'),
	'Nuovo fondo',
);

$this->menu=array(
	array('label'=>'Elenco fondi', 'url'=>array('index')),
	array('label'=>'Gestione fondi', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
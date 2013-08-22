<?php
$this->pageCaption='Nuova pagina';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
//$this->pageDescription='Define a new pagina';
$this->breadcrumbs=array(
	'Pagine'=>array('index'),
	'Nuova',
);

$this->menu=array(
	array('label'=>'Elenco pagine', 'url'=>array('index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
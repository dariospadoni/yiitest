<?php
$this->pageCaption='';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
//$this->pageDescription='Define a new medico';
$this->breadcrumbs=array(
	'Medici'=>array('index'),
	'Nuovo medico',
);

$this->menu=array(
	array('label'=>'Elenco medici', 'url'=>array('index')),
	//array('label'=>'Gestione medici', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
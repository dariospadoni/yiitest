<?php
$this->pageCaption='Update FondoPrestazione '.$model->id_fondo_prestazione;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Fondo Prestaziones'=>array('index'),
	$model->id_fondo_prestazione=>array('view','id'=>$model->id_fondo_prestazione),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fondo Prestaziones', 'url'=>array('index')),
	array('label'=>'Create FondoPrestazione', 'url'=>array('create')),
	array('label'=>'View FondoPrestazione', 'url'=>array('view', 'id'=>$model->id_fondo_prestazione)),
	array('label'=>'Manage Fondo Prestaziones', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
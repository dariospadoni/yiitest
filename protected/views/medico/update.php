<?php
$this->pageCaption='Update Medico '.$model->id_medico;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Medicos'=>array('index'),
	$model->id_medico=>array('view','id'=>$model->id_medico),
	'Update',
);

$this->menu=array(
	array('label'=>'List Medicos', 'url'=>array('index')),
	array('label'=>'Create Medico', 'url'=>array('create')),
	array('label'=>'View Medico', 'url'=>array('view', 'id'=>$model->id_medico)),
	array('label'=>'Manage Medicos', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
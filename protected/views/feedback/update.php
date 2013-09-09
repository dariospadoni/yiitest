<?php
$this->pageCaption='Update Feedback '.$model->id_feedback;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	$model->id_feedback=>array('view','id'=>$model->id_feedback),
	'Update',
);

$this->menu=array(
	array('label'=>'List Feedbacks', 'url'=>array('index')),
	array('label'=>'Create Feedback', 'url'=>array('create')),
	array('label'=>'View Feedback', 'url'=>array('view', 'id'=>$model->id_feedback)),
	array('label'=>'Manage Feedbacks', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
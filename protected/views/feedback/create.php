<?php
$this->pageCaption='Create Feedback';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new feedback';
$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Feedbacks', 'url'=>array('index')),
	array('label'=>'Manage Feedbacks', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
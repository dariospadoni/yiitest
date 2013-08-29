<?php
$this->pageCaption='Fondo Prestaziones';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all fondo prestaziones';
$this->breadcrumbs=array(
	'Fondo Prestaziones',
);

$this->menu=array(
	array('label'=>'Create FondoPrestazione', 'url'=>array('create')),
	array('label'=>'Manage FondoPrestazione', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

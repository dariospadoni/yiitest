<?php
$this->pageCaption='Medici';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Elenco dei medici';
$this->breadcrumbs=array(
	'Medici',
);

$this->menu=array(
	array('label'=>'Nuovo medico', 'url'=>array('create')),
	//array('label'=>'Gestione medici', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

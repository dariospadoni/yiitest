<?php
/* @var $this PrestazioneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Prestazioni',
);

$this->menu=array(
	array('label'=>'Nuova prestazione', 'url'=>array('create')),
	array('label'=>'Gestisci prestazioni', 'url'=>array('admin')),
);
?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this PrestazioneController */
/* @var $model Prestazione */

$this->breadcrumbs=array(
	'Prestazioni'=>array('index'),
	'Nuova',
);

$this->menu=array(
	array('label'=>'Lista prestazioni', 'url'=>array('index')),
	array('label'=>'Gestione prestazioni', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
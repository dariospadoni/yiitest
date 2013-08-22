<?php
/* @var $this PrestazioneController */
/* @var $model Prestazione */

$this->breadcrumbs=array(
	'Prestazioni'=>array('index'),
	'Gestione',
);

$this->menu=array(
	array('label'=>'Elenco prestazioni', 'url'=>array('index')),
	array('label'=>'Nuova prestazione', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#prestazione-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prestazione-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_prestazione',
		'nome',
		'codice',
		'descrizione',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

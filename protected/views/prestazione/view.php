<?php
/* @var $this PrestazioneController */
/* @var $model Prestazione */

$this->breadcrumbs=array(
	'Prestaziones'=>array('index'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'Lista Prestazioni', 'url'=>array('index')),
	array('label'=>'Nuova prestazioni', 'url'=>array('create')),
	array('label'=>'Modifica prestazione', 'url'=>array('update', 'id'=>$model->id_prestazione)),
	array('label'=>'Elimina prestazione', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_prestazione),'confirm'=>'Sei sicuro di voler eliminare questa prestazione?')),
	array('label'=>'Gestione prestazioni', 'url'=>array('admin')),
);
?>

<h1>View Prestazione <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_prestazione',
		'nome',
		'codice',
		'descrizione',
	),
)); ?>

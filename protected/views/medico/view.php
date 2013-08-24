<?php
$this->pageCaption='Visualizza medico '.$model->nome;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Medici'=>array('index'),
	$model->id_medico,
);

$this->menu=array(
	array('label'=>'Elenco medici', 'url'=>array('index')),
	array('label'=>'Nuovo medico', 'url'=>array('create')),
	array('label'=>'Modifica medico', 'url'=>array('update', 'id'=>$model->id_medico)),
	array('label'=>'Elimina medico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_medico),'confirm'=>'Sei sicuro di voler eliminare questo medico?')),
	//array('label'=>'Gestione medici', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'id_medico',
		'id_user',
		'specializzazione',
		'formazione',
		'esperienze_precedenti',
		'attivita_accademica',
		'attivita_scientifica',
		'pubblicazioni',
		'foto',
	),
)); ?>

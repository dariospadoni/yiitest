<?php
$this->pageCaption='Visualizza pagina '.$model->nome;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Pagine'=>array('index'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'Elenco pagine', 'url'=>array('index')),
	array('label'=>'Nuova pagina', 'url'=>array('create')),
	array('label'=>'Modifica pagina', 'url'=>array('update', 'id'=>$model->id_pagina)),
	array('label'=>'Elimina pagina', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pagina),'confirm'=>'Sei sicuro di voler eliminare questa pagina?')),
);
?>


<style>
    th {  text-align: left; vertical-align: top;}

</style>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
    'htmlOptions' => array('cellpadding'=>'10'),
	'attributes'=>array(
        'nome',
        'ultima_modifica',
		'contenuto:html',
    	),
)); ?>

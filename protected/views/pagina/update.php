<?php
$this->pageCaption='Modifica pagina '.$model->nome;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Pagine'=>array('index'),
	$model->id_pagina=>array('view','id'=>$model->id_pagina),
	'Modifica',
);

$this->menu=array(
	array('label'=>'Elenco pagine', 'url'=>array('index')),
	array('label'=>'Nuova pagina', 'url'=>array('create')),
	array('label'=>'Visualizza pagina', 'url'=>array('view', 'id'=>$model->id_pagina)),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
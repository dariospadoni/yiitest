<?php
$this->pageCaption='Modifica paziente'.$model->nomeCompleto();
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Pazienti'=>array('index'),
	$model->nomeCompleto()=>array('view','id'=>$model->id_paziente),
	'Modifica',
);

$this->menu=array(
    array('label'=>'Gestione pazienti', 'url'=>array('admin')),
    //array('label'=>'Elenco pazienti', 'url'=>array('index')),
	array('label'=>'Nuovo paziente', 'url'=>array('create')),
	//array('label'=>'Visualizza paziente', 'url'=>array('view', 'id'=>$model->id_paziente)),

);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->pageCaption='Modifica scheda medico '.$model->nomeCompleto();
//$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Medici'=>array('index'),
	$model->nomeCompleto()=>array('view','id'=>$model->id_user),
	'Modifica',
);

$this->menu=array(
    array('label'=>'Elenco medici', 'url'=>array('index')),
	array('label'=>'Visualizza medico', 'url'=>array('view', 'id'=>$model->id_user)),
	//array('label'=>'Manage Medicos', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
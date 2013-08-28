<?php
$this->pageCaption='Update Fondo '.$model->id_fondo;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Fondi'=>array('index'),
	$model->nome=>array('view','id'=>$model->id_fondo),
	'Modifica fondo',
);

$this->menu=array(
	array('label'=>'Elenco fondi', 'url'=>array('index')),
	array('label'=>'Nuovo fondo', 'url'=>array('create')),
	array('label'=>'Visualizza fondo', 'url'=>array('view', 'id'=>$model->id_fondo)),
    array('label'=>'Elimina fondo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fondo),'confirm'=>'Sei sicuro di voler eliminare questo fondo?')),
//	array('label'=>'Gestione fondi', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->pageCaption='Scheda fondo '.$model->nome;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Fondi'=>array('index'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'Elenco fondi', 'url'=>array('index')),
	array('label'=>'Nuovo  fondo', 'url'=>array('create')),
	array('label'=>'Modifica fondo', 'url'=>array('update', 'id'=>$model->id_fondo)),
	array('label'=>'Elimina fondo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fondo),'confirm'=>'Sei sicuro di voler eliminare questo fondo?')),
	//array('label'=>'Gestione fondi', 'url'=>array('admin')),
);
?>



<div class="row-fluid">
    <div class="span3">
        <div class="btn">
            <img src="data:image/gif;base64,<?= $model->getImageData(); ?>"  alt="logo fondo"/>
        </div>

        <?php  if ($model->sito_web!="") { ?>
sd
        <?php } ?>
    </div>

    <div class="span6">
        <h4><?= $model->nome ?> </h4>
        <br/>
        <div> <?= $model->descrizione ?> </div>
    </div>
</div>



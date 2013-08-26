<?php
//$this->pageCaption='Scheda medico '.$model->nomeCompleto();
//$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Medici'=>array('index'),
	$model->nomeCompleto(),
);

$this->menu=array(
	array('label'=>'Elenco medici', 'url'=>array('index')),
	array('label'=>'Nuovo medico', 'url'=>array('create')),
	array('label'=>'Modifica medico', 'url'=>array('update', 'id'=>$model->id_user)),
	array('label'=>'Elimina medico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user),'confirm'=>'Sei sicuro di voler eliminare questo medico?')),
//	array('label'=>'Gestione medici', 'url'=>array('admin')),
);
?>


<div class="row-fluid">
    <div class="span3">
        <div class="btn">
            <img src="data:image/gif;base64,<?= $model->getImageData(); ?>"  alt="foto medico"/>
        </div>
    </div>

    <div class="span8">
        <h4><?= $model->nomeCompleto() ?> </h4>

        <label> Specializzazione: </label> <b> <?= $model->medico->specializzazione ?></b>
        <hr/>

        <label> Formazione: </label>  <?= $model->medico->formazione ?>
        <hr/>

        <label> Esperienze: </label>  <?= $model->medico->esperienze_precedenti?>
        <hr/>

        <label> Attivit&agrave; accademica: </label>  <?= $model->medico->attivita_accademica ?>
        <hr/>

        <label> Attivit&agrave; scientifica: </label>  <?= $model->medico->attivita_scientifica ?>
        <hr/>

        <label> Pubblicazioni: </label>  <?= $model->medico->pubblicazioni ?>
        <hr/>


    </div>

</div>


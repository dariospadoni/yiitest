<style>
    .grid-view table.items th { text-align:left;}
</style>
<?php
$this->pageCaption='Gestione pazienti';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
//$this->pageDescription='Administer all pazientes';
$this->breadcrumbs=array(
	'Gestione pazienti',
);

$this->menu=array(
//	array('label'=>'Elenco pazienti', 'url'=>array('index')),
	array('label'=>'Nuovo paziente', 'url'=>array('create')),
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'paziente-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	// 'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	//'itemsCssClass'=>'zebra-striped',
	'columns'=>array(

        'nome',
        'cognome',
		'cf',
        'codice_sanitario',
        'telefono',
		'citta',

		array(
			'class'=>'CButtonColumn',
            'deleteConfirmation'=>"Sei sicuro di voler eliminare questo paziente?"
		),
	),
)); ?>

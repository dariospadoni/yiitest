<?php
$this->pageCaption='Manage Prenotaziones';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administer all prenotaziones';
$this->breadcrumbs=array(
	'Prenotazioni'=>array('index'),
	'Gestione prenotazioni',
);

$this->menu=array(
	array('label'=>'Lista prenotazioni', 'url'=>array('index')),
	array('label'=>'Nuova prenotazione', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('prenotazione-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prenotazione-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'zebra-striped',
	'columns'=>array(
		'id_prenotazione',
		'id_fondo',
		'id_prestazione',
		'id_paziente',
		'data_creazione',
		'data_visita',
		/*
		'assegnata',
		'note_paziente',
		'note_gmc',
		'id_user',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
$this->pageCaption='Prenotazioni';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gestione prenotazioni',
);

$this->menu=array(
	array('label'=>'Nuova prenotazione', 'url'=>array('create')),
);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'prenotazione-grid',
    'dataProvider'=>$model->search(),
    'columns'=>array(
        'nomePaziente',
        'nomePrestazione',
        'data_creazione',
         array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>

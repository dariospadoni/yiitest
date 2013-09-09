<?php
$this->pageCaption='Prenotazioni';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gestione prenotazioni',
);

$this->menu=array(
	array('label'=>'Nuova prenotazione', 'url'=>array('create')),
    array('label'=>'Calendario visite', 'url'=>array('calendar')),
);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'prenotazione-grid',
    'dataProvider'=>$model->search(),
    'columns'=>array(
        'nomePaziente',
        'nomePrestazione',
        array(
            'name'=>'data_creazione',
            'value'=>'Yii::app()->dateFormatter->format("dd/MM/y HH:mm",strtotime($data->data_creazione))'
        ),
        array(
            'name'=>'data_visita',
            'value'=>'Yii::app()->dateFormatter->format("dd/MM/y HH:mm",strtotime($data->data_visita))'
        ),

         array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>

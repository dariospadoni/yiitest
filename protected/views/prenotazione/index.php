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
 //   'filter'=>$model,
    'columns'=>array(
        'nomePaziente',
       // 'nomeFondo',
        'nomePrestazione',
        'data_creazione',
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

<?php
/* @var $this PrestazioneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Elenco prestazioni',
);

$this->menu=array(
	array('label'=>'Nuova prestazione', 'url'=>array('create')),
	//array('label'=>'Gestisci prestazioni', 'url'=>array('admin')),
);
?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'prestazione-grid',
    'dataProvider'=>$dataProvider,
    //'filter'=>$model,
    'columns'=>array(
        'nome',
        'codice',
        'descrizione:html',
        array(
            'class'=>'CButtonColumn',
            'deleteConfirmation'=>"Sei sicuro di voler eliminare questa prestazione?",
        ),
    ),
)); ?>


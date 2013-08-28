<?php
$this->pageCaption='Pagine';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Lista  pagine';
$this->breadcrumbs=array(
	'Pagine',
);

$this->menu=array(
	array('label'=>'Nuova pagina', 'url'=>array('create')),
);
?>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'pagine-grid',
    'dataProvider'=> $dataProvider,
    'columns'=> array(
        'nome',
        'area_sito',
        array(
            'name'=>'ultima_modifica',
            'value'=>'date("j M Y", strtotime( $data->ultima_modifica))',
            'htmlOptions' => array( 'style'=>'width:120px')
        ),
        array(
            'class'=>'CButtonColumn',
            'deleteConfirmation'=>"Sei sicuro di voler eliminare questa pagina?",
        )
    )
));

?>


<?php
/* @var $this PrestazioneController */
/* @var $model Prestazione */

$this->breadcrumbs=array(
	'Prestazioni'=>array('index'),
	$model->nome=>array('view','id'=>$model->id_prestazione),
	'Modifica',
);

$this->menu=array(
	array('label'=>'Elenco prestazioni', 'url'=>array('index')),
	array('label'=>'Nuova prestazione', 'url'=>array('create')),
	array('label'=>'Visualizza prestazione', 'url'=>array('view', 'id'=>$model->id_prestazione)),
	array('label'=>'Gestione prestazioni', 'url'=>array('admin')),
);
?>

<h1>Modifica prestazione <?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<h3> Allegati </h3>
<?php

  $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'allegati-grid',
        'dataProvider'=> new CArrayDataProvider($model->allegati,array(
            'keyField'=>'id_allegato_prestazione'
        )),

        'columns'=> array('nome','url',/*'estensione',*/
            array (
                'class'=>'CLinkColumn',
                'linkHtmlOptions'=>array('target'=>'_blank'),
                'label'=>'Visualizza',
                //'htmlOptions'=>array('class'=>'icon-remove-sign'),
                'urlExpression' => 'Yii::app()->baseUrl . "/php/fileUpload/files/".$data->url',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{delete}',
                'deleteButtonLabel'=>"Elimina",
                'deleteButtonImageUrl'=>false,
                'deleteButtonUrl' => 'Yii::app()->createUrl("allegato/delete&id="."$data->id_allegato_prestazione")'
            )
        )
    ));

?>



<?php
    $this->renderPartial('_allegatoCreate',array('model'=> new AllegatoDto($model->id_prestazione )));
?>


<?php
/* @var $this PrestazioneController */
/* @var $model Prestazione */

$this->breadcrumbs=array(
	'Prestazioni'=>array('index'),
	$model->nome=>array('view','id'=>$model->id_prestazione),
	'Modifica dati prestazione',
);

$this->menu=array(
	array('label'=>'Elenco prestazioni', 'url'=>array('index')),
	array('label'=>'Nuova prestazione', 'url'=>array('create')),
	array('label'=>'Visualizza prestazione', 'url'=>array('view', 'id'=>$model->id_prestazione)),
	array('label'=>'Gestione prestazioni', 'url'=>array('admin')),
);
?>

<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
    <li class="active"><a data-toggle="tab" href="#pane1">Dati</a></li>
    <li><a data-toggle="tab"  href="#pane2">Allegati</a></li>
    <li><a data-toggle="tab"  href="#pane3">Fondi</a></li>
</ul>

<div class="tab-content">

    <div id="pane1" class="tab-pane active">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>

    <div id="pane2" class="tab-pane">
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

            $this->renderPartial('_allegatoCreate',array('model'=> new AllegatoDto($model->id_prestazione )));
    ?>
    </div>

    <div id="pane3" class="tab-pane">
        <?php

//
//            $dataProvider=new CArrayDataProvider ($model->fondi,array(
//                'keyField'=>'id_fondo_prestazione',
//            ));


        $this->renderPartial('_fondi',array('model'=> $model->fondi ));
        ?>
    </div>

</div>






<script type="text/javascript">
    $(document).ready(function () {
        $('#tabs').tab();
    });
</script>
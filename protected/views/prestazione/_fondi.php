<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.jeditable.mini.js');
?>

<!--<script src="http://www.appelsiini.net/download/jquery.jeditable.mini.js" type="text/javascript"></script>-->
<style>
    table{width:100%;}
    th { color:#08c; text-align:left;}
</style>

<?php


$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'fondo-prestazione-grid',
    'dataProvider'=>$model->fondiPrestazione,
    'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
    'itemsCssClass'=>'zebra-striped',
    'columns'=>array(
        array(
            'name'=>'Nome Fondo',
            'value'=>'$data->nomeFondo',
        ),

        'prezzo' => array(
            'type'=>'html',
            'value' => '"<a  class=\'editable-".$data->id_fondo_prestazione."\'>$data->prezzo</a>"',
            'name' => 'Prezzo'
        ),
        array
        (
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
            'deleteConfirmation'=>"Sei sicuro di voler eliminare l'associazione con questo fondo?",
            'deleteButtonUrl'=>'Yii::app()->createUrl("prestazione/disassociaFondo", array("id"=>$data->id_fondo_prestazione))',
            'afterDelete'=>'function(){updateComboFondiDisponibili('.$model->id_prestazione.');}',
        )
    )
));?>

    <button id="btn-associa-fondo" href="#nuovo-fondo-prestazione-dialog" role="button" data-toggle="modal" class="btn btn-primary" >Aggiungi fondo</button>

    <?php
        $this->renderPartial('_nuovoFondo',array('model'=> $model ));
    ?>

<?php

//http://help.discretelogix.com/php/yii/enable-in-place-editing-in-yii-grid.htm
Yii::app()->clientScript->registerScript('status','

	$("a[class^=editable-]").live("click", function () {
		$(this).editable("'.$this->createUrl('prestazione/aggiornaPrezzo').'", {
			submitdata : function (value,settings){
							return {"id_fondo_prestazione":$(this).attr("class").substr("9"),};                     },
			indicator : "Salvataggio in corso...",
			tooltip   : "Clicca per modificare...",
		    submit   : "OK",
            name : "prezzo"
		 });
	});

',CClientScript::POS_READY);

?>

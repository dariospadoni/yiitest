<style>
    table{width:100%;}
    th { color:#08c; text-align:left;}
</style>

<?php


$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'prestazioni-fondo-grid',
    'dataProvider'=>$model->prestazioniAssociate,
    'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
    'itemsCssClass'=>'zebra-striped',
    'columns'=>array(
        array(
            'name'=>'Nome',
            'value'=>'$data->nomePrestazione',
        ),
        array(
            'name'=>'Codice',
            'value'=>'$data->codicePrestazione',
        ),
        'prezzo',


        array
        (
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
            'deleteConfirmation'=>"Sei sicuro di voler eliminare l'associazione con questa prestazione?",
            'deleteButtonUrl'=>'Yii::app()->createUrl("fondo/disassociaPrestazione", array("id"=>$data->id_fondo_prestazione))',
            'afterDelete'=>'function(){updateComboPrestazioniNonAssociate('.$model->id_fondo.');}',
        )
    )))
;?>


<button id="btn-associa-prestazione" href="#nuovo-prestazione-fondo-dialog" role="button" data-toggle="modal" class="btn btn-primary" >Aggiungi prestazione</button>


<?php
   $this->renderPartial('_associaPrestazione',array('model'=> $model ));
?>
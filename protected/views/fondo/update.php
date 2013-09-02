<?php
$this->pageCaption='Update Fondo '.$model->id_fondo;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Fondi'=>array('index'),
	$model->nome=>array('view','id'=>$model->id_fondo),
	'Modifica fondo',
);

$this->menu=array(
	array('label'=>'Elenco fondi', 'url'=>array('index')),
	array('label'=>'Nuovo fondo', 'url'=>array('create')),
	array('label'=>'Visualizza fondo', 'url'=>array('view', 'id'=>$model->id_fondo)),
    array('label'=>'Elimina fondo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fondo),'confirm'=>'Sei sicuro di voler eliminare questo fondo?')),
//	array('label'=>'Gestione fondi', 'url'=>array('admin')),
);
?>


<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
    <li class="active"><a data-toggle="tab" href="#pane1">Scheda fondo</a></li>
    <li><a data-toggle="tab"  href="#pane2">Prestazioni</a></li>
</ul>



<div class="tab-content">

    <div id="pane1" class="tab-pane active">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>

    <div id="pane2" class="tab-pane">
        <?php echo $this->renderPartial('_prestazioniAssociate', array('model'=>$model)); ?>
    </div>

</div>




<script type="text/javascript">

    $(document).ready(function () {
        $("#btn-associa-prestazione").toggle ($("#FondoPrestazione_id_prestazione option").length>0 );
        $('#tabs').tab();
    });



    function updateComboPrestazioniNonAssociate (id_fondo){
        $.ajax({
            type:'POST',
            url: "<?php echo $this->createUrl('prestazioniNonAssociate'); ?>",
            dataType:'json',
            data: {id_fondo:id_fondo},
            success: function(data){
                $("#FondoPrestazione_id_prestazione").empty().html(data.data);
                $("#btn-associa-prestazione").toggle ($("#FondoPrestazione_id_prestazione option").length>0 );
            }
        });

    }

    function nuovaAssociazioneSuccessCallback(result)
    {
        if(result.success==true) {
            $.fn.yiiGridView.update("prestazioni-fondo-grid");
            updateComboPrestazioniNonAssociate(<?php echo $model->id_fondo; ?>);
        }
        else
            alert(result.msg);
    }


    function submitAssociaPrestazione (form, data, hasError){
        if (!hasError){
            $(".modal-backdrop").remove();
            $("#nuovo-prestazione-fondo-dialog").modal("hide");
            $.post(
                "<?php echo $this->createUrl('associaPrestazione'); ?>",
                $("#nuovo-prestazione-fondo-form").serialize() ,
                nuovaAssociazioneSuccessCallback,
                "json");
            return false;
        }
    };



</script>
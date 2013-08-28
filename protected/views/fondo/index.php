<?php
$this->pageCaption='Fondi';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->breadcrumbs=array(
	'Fondi',
);

$this->menu=array(
	array('label'=>'Nuovo fondo', 'url'=>array('create')),
//	array('label'=>'Gestione fondi', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


<script type="text/javascript">

    function PromptDeleteFondo (id){
        var res = confirm ('Sei sicuro di voler eliminare questo fondo?');
        if (res==true)
        {
            window.location= '<?= Yii::app()->createUrl("/fondo/delete")?>&id='+id;
        }
    }
</script>

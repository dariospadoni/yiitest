<?php
$this->pageCaption='Medici';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Elenco dei medici';
$this->breadcrumbs=array(
    'Elenco medici',
);

$this->menu=array(
    array('label'=>'Nuovo medico', 'url'=>array('create')),
    //array('label'=>'Gestione medici', 'url'=>array('admin')),
);

?>

<script type="text/javascript">

    function PromptDeleteMedico (id){
        var res = confirm ('Sei sicuro di voler eliminare questo medico?');
        if (res==true)
        {
            window.location= '<?= Yii::app()->createUrl("/medico/delete")?>&id='+id;
        }
    }
</script>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>

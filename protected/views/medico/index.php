<?php
$this->pageCaption='Medici';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Elenco dei medici';
$this->breadcrumbs=array(
	'Medici',
);

$this->menu=array(
	array('label'=>'Nuovo medico', 'url'=>array('create')),
	//array('label'=>'Gestione medici', 'url'=>array('admin')),
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('medico-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<?php echo CHtml::link('Ricerca','#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
        'model'=>$model,
        'specializzazioni'=>$specializzazioni
    )); ?>
</div><!-- search-form -->



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',

)); ?>

<?php
$this->pageCaption='Feedbacks';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Lista dei feedbacks';
$this->breadcrumbs=array(
	'Feedbacks',
);


?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'feedback-grid',
    'dataProvider'=>$model->search(),
    'columns'=>array(
        'cognome',
        'nome',
        'email',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{delete}'
        ),
    ),
)); ?>



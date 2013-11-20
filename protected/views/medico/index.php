<?php
$this->pageCaption='Medici';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Elenco dei medici';
$this->breadcrumbs=array('Medici');

?>

<div class="pageHeader">
    <h3>MEDICI</h3>
    <p>Sottotitolo lorem ipsum dolor sit amet deo dolor sit amet deo
        dolor sit amet deo dolor sit amet deo</p>
</div>
    <div class="navSpacer"></div><div class="navSpacer"></div>
<?php


?>

<?php $this->widget('ext.alphapager.ApListView', array(
    'dataProvider'=>$dataProvider,
    'alphaPager'=>array('header'=>'','cssFile'=>'' ),
    'itemView'=>'_alphaPager',
    'template'=>"{alphapager}\n{items}",
)); ?>
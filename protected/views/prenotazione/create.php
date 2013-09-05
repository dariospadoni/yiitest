<?php
$this->pageCaption='Nuova prenotazione';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
?>

<?php

if ($step==1){

//    $this->breadcrumbs=array(
//        'Seleziona  fondo'=>array('create','step'=>1)
//     );

    echo $this->renderPartial('_formFondo', array('model'=>$model,'fondi'=>$fondi));
}

if ($step==2){
//    $this->breadcrumbs=array(
//        'Seleziona  fondo'=>array('create'),
//        'Seleziona  prestazione'=>array('create','step'=>2)
//    );
    echo $this->renderPartial('_formPrestazione', array('model'=>$model,'prestazioni'=>$prestazioni));
}

if ($step==3){
//    $this->breadcrumbs=array(
//        'Seleziona  fondo'=>array('create'),
//        'Seleziona  prestazione'=>array('create','step'=>2),
//        'Dati personali'=>array('create','step'=>3),
//    );

    echo $this->renderPartial('_formDatiPaziente', array('model'=>new Paziente()));
}

if ($step==4){

//    $this->breadcrumbs=array(
//        'Seleziona  fondo'=>array('create'),
//        'Seleziona  prestazione'=>array('create','step'=>2),
//        'Dati personali'=>array('create','step'=>3),
//        'Riepilogo'=>array('create','step'=>4),
//    );
    echo $this->renderPartial('_formRiepilogo', array('model'=>$model));
}

?>



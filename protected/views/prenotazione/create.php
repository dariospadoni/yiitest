<?php
$this->pageCaption='Nuova prenotazione';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
?>

<?php

if ($step==1){

    $this->breadcrumbs=array( 'Scegli fondo'  );

    echo $this->renderPartial('_formFondo', array('model'=>$model,'fondi'=>$fondi));
}

if ($step==2){
    $this->breadcrumbs=array( 'Nuova prenotazione',  'Scegli prestazione'  );
    echo $this->renderPartial('_formPrestazione', array('model'=>$model,'prestazioni'=>$prestazioni));
}

if ($step==3){
    $this->breadcrumbs=array( 'Nuova prenotazione',    'Scegli prestazione', 'Dati personali'  );
    echo $this->renderPartial('_formDatiPaziente', array('model'=>new Paziente()));
}

if ($step==4){
    $this->breadcrumbs=array( 'Nuova prenotazione',     'Scegli prestazione', 'Dati personali' ,'Riepilogo' );
    echo $this->renderPartial('_formRiepilogo', array('model'=>$model));
}

?>



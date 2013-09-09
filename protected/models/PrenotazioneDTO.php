<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Utente
 * Date: 09/09/13
 * Time: 15.19
 * To change this template use File | Settings | File Templates.
 */

//mapping verso Event_Object del controllo full calendar
class PrenotazioneDTO   {

    public $id;
    public $title;
    public $start;
    public $url ;

    public function __construct($prenotazione) {
        $this->id = $prenotazione->id_prenotazione;
        $this->title = $prenotazione->nomePaziente . " - " . $prenotazione->nomePrestazione;
        $this->start = $prenotazione->data_visita;
        $this->url =  Yii::app()->createUrl(  "/prenotazione/view&id=" . $this->id);
    }


}
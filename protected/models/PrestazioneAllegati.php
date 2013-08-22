<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Utente
 * Date: 15/08/13
 * Time: 10.42
 * To change this template use File | Settings | File Templates.
 */

class PrestazioneAllegati extends CFormModel {

    public $id_prestazione;
    public $nome;
    public $codice;
    public $descrizione;
    public $allegati = array();
    public $isNewRecord = false;


    public function __construct($prestazione) {

        $this->id_prestazione= $prestazione->id_prestazione;
        $this->nome = $prestazione->nome;
        $this->codice = $prestazione->codice;
        $this->descrizione = $prestazione->descrizione;

        $allegatoPrestazione = new AllegatoPrestazione();
        $allegatiPrestazione = $allegatoPrestazione::model()->findAll('id_prestazione=:id_prestazione',
                                                                    array(':id_prestazione'=>$this->id_prestazione));
        if (isset ($allegatiPrestazione))
            foreach ($allegatiPrestazione as $item)
                array_push( $this->allegati, $item);
    }


    public function rules()
    {

        return array(
            array('nome, descrizione', 'required' ),
            array('nome', 'length', 'max'=>200),
            array('codice', 'length', 'max'=>20),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id_prestazione' => 'Id Prestazione',
            'nome' => 'Nome',
            'codice' => 'Codice',
            'descrizione' => 'Descrizione',
        );
    }


}
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
    public $prezzo;

    public $fondiPrestazione = array();
    public $fondiDisponibili = array();
    public $allegati = array();
    public $isNewRecord = false;


    public function __construct($prestazione) {

        $this->id_prestazione= $prestazione->id_prestazione;
        $this->nome = $prestazione->nome;
        $this->codice = $prestazione->codice;
        $this->descrizione = $prestazione->descrizione;
        $this->prezzo = $prestazione->prezzo;

        $allegatoPrestazione = new AllegatoPrestazione();
        $allegatiPrestazione = $allegatoPrestazione::model()->findAll('id_prestazione=:id_prestazione',
                                                                    array(':id_prestazione'=>$this->id_prestazione));


        //fondi associati alla prestazione
        $criteria = new CDbCriteria();
        $criteria -> select = 't.*,p.nome as nomePrestazione,f.nome as nomeFondo';
        $criteria -> join = 'INNER JOIN gmc_fondo f on f.id_fondo = t.id_fondo ';
        $criteria -> join .= 'INNER JOIN gmc_prestazione p on p.id_prestazione = t.id_prestazione';
        $criteria -> condition = 'p.id_prestazione = :id_prestazione';
        $criteria -> params = array(':id_prestazione' => $this->id_prestazione);
        $fondiPrestazione = new CActiveDataProvider( 'FondoPrestazione',array(
            'criteria' => $criteria
        ));
        $this->fondiPrestazione = $fondiPrestazione;

        //fondi disponibili (tutti meno quelli già associati)
        $criteria = new CDbCriteria();
        $criteria -> select = 't.*';
        $criteria -> condition = 't.id_fondo not in (select id_fondo from gmc_fondo_prestazione fp where fp.id_prestazione=:id_prestazione)';
        $criteria -> params = array(':id_prestazione' => $this->id_prestazione);
        $fondiDisponibili = Fondo::model()->findAll( $criteria );
        $this->fondiDisponibili = $fondiDisponibili;

        if (isset ($allegatiPrestazione))
            foreach ($allegatiPrestazione as $item)
                array_push( $this->allegati, $item);

    }


    public function rules()
    {

        return array(
            array('nome, descrizione, prezzo', 'required' ),
            array('prezzo','numerical'),
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
            'prezzo'=>'Prezzo'
        );
    }


}
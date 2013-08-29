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

    public $fondi = array();
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
     //   $fondo = new FondoPrestazione();
//        $fondi = $fondo::model()->findAll('id_prestazione=:id_prestazione',
//                                                                    array(':id_prestazione'=>$this->id_prestazione));
/*
        $fondi = new CActiveDataProvider("gmc_fondo_prestazione", array(
            'criteria' => array(
                'select' => array(
                    'fp.*',
                    'f.nome  AS nomeFondo',
                    'p.nome  AS nomePrestazione'
                ),
                'join' => 'JOIN gmc_fondo as f ON f.id_fondo = fp.id_fondo',
                'join' => 'JOIN gmc_prestazione as p ON p.id_prestazione= fp.id_prestazione',
            )
        ));
*/
        $criteria = new CDbCriteria();
        $criteria -> select = 't.*,p.nome as nomePrestazione,f.nome as nomeFondo';
        $criteria -> join = 'INNER JOIN gmc_fondo f on f.id_fondo = t.id_fondo ';
        $criteria -> join .= 'INNER JOIN gmc_prestazione p on p.id_prestazione = t.id_prestazione';
        $criteria -> condition = 'p.id_prestazione = :id_prestazione';
        $criteria -> params = array(':id_prestazione' => $this->id_prestazione);
        $fondi = new CActiveDataProvider( 'FondoPrestazione',array(
            'criteria' => $criteria
        ));

        $this->fondi = $fondi;

        if (isset ($allegatiPrestazione))
            foreach ($allegatiPrestazione as $item)
                array_push( $this->allegati, $item);
//
//        if (isset ($fondi))
//            foreach ($fondi as $item)
//                array_push( $this->fondi, $item);
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
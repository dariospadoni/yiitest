<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Utente
 * Date: 15/08/13
 * Time: 14.38
 * To change this template use File | Settings | File Templates.
 */

class AllegatoDto extends CFormModel{
    public $id_prestazione;
    public $nome;
    public $url;

    public function __construct($id_prestazione) {
        $this->id_prestazione = $id_prestazione;
    }

    public function rules()
    {
        return array(
            array('nome, url', 'required'),
            array('nome', 'length', 'max'=>200),
            array('url', 'length', 'max'=>255)
        );
    }

}
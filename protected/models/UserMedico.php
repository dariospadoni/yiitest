<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Utente
 * Date: 24/08/13
 * Time: 11.44
 * To change this template use File | Settings | File Templates.
 */

class UserMedico  extends CFormModel {

    public $id_user;
    public $nome;
    public $cognome;
    public $email;
    public $password;
    public $medico;

    public function getImageData (){
        if (isset($this->medico->foto))
            return base64_encode ($this->medico->foto);
        else
            return "";
    }

    public function nomeCompleto (){
        return $this->nome . " " . $this->cognome;
    }

    public function isNewRecord(){
        return ! isSet ($this->id_user );
    }


    public function __construct($user) {

        $this->medico = new Medico();


        //$user non è definito nel caso di creazione nuovo medico
        if (isset($user)){
            $this->id_user= $user->id_user;
            $this->nome = $user->nome;
            $this->cognome = $user->cognome;
            $this->email = $user->email;
            $this->password = $user->password ;
            $this->medico = Medico::model()->find('id_user='. $this->id_user);
        }
    }

    public function rules()
    {
        return array(
            array('nome, cognome, email, password', 'required'),
            array('nome, cognome, email', 'length', 'max'=>100),
            array('password', 'length', 'max'=>50),
        );
    }

    public function search()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('nome','nome',true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }


}
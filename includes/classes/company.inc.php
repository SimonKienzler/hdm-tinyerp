<?php

/**
 * Created by PhpStorm.
 * User: Heike
 * Date: 30.08.2016
 * Time: 12:57
 */

class Company
{
    private $id = null;
    private $name;
    private $street;
    private $zipCode;
    private $city;
    private $bank;
    private $bic;
    private $iban;
    private $register;
    private $registerNr;
    private $eMail;
    private $ceo;
    private $vatid;
    
    public function __construct($zipCode, $cityName, $name, $bank, $bic, $iban, $register, $registerNr, $eMail, $street, $ceo, $vatid){
        $this->zipCode = $zipCode;
        $this->city = $cityName;
        $this->name = $name;
        $this->bank = $bank;
        $this->bic = $bic;
        $this->iban = $iban;
        $this->register = $register;
        $this->registerNr = $registerNr;
        $this->eMail = $eMail;
        $this->street = $street;
        $this->ceo = $ceo;
        $this->vatid = $vatid;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param mixed $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }

    /**
     * @return mixed
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param mixed $bic
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
    }

    /**
     * @return mixed
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param mixed $iban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return mixed
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * @param mixed $register
     */
    public function setRegister($register)
    {
        $this->register = $register;
    }

    /**
     * @return mixed
     */
    public function getRegisterNr()
    {
        return $this->registerNr;
    }

    /**
     * @param mixed $registerNr
     */
    public function setRegisterNr($registerNr)
    {
        $this->registerNr = $registerNr;
    }

    /**
     * @return mixed
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * @param mixed $eMail
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getCeo()
    {
        return $this->ceo;
    }

    /**
     * @param mixed $ceo
     */
    public function setCeo($ceo)
    {
        $this->ceo = $ceo;
    }

    /**
     * @return mixed
     */
    public function getVatid()
    {
        return $this->vatid;
    }

    /**
     * @param mixed $vatid
     */
    public function setVatid($vatid)
    {
        $this->vatid = $vatid;
    }

    /**
     * @param $company
     * @return string
     */

    public function listObject()
    {
        $return = '
        <h6>' . $this->getName() . '</h6>
        <p>Adresse: ' . $this->getStreet() . ' - ' . $this->getZipCode(). ' - '. $this->getCityName()
        .' CEO: ' . $this->getCeo() . 'eMail: ' . $this->getEMail()
        .' Bank: ' . $this->getBank() . 'BIC: ' . $this->getBic(). 'IBAN: ' . $this->getIban()
        .'Register: ' .$this->getRegister() . 'RegisterNr: ' .$this->getRegisterNr() .'MwSt: ' .$this->getVatid() . '
        <a href="">bearbeiten</a> | <a href="">löschen</a>
        </p>        
        ';

        return $return;
    }

    public static function getDropdown($company)
    {
        $content = "
        <select class='dropdown'  name=\"Firma\">
        <option selected value=\"null\">&nbsp;</option> ";

        foreach ($company as $c)
        {
            $content .= "<option value=\"" .$c->getId()."\">" .$c->getName()."</option>\n";
        }

        $content .= "</select>";

        return $content;
    }

}
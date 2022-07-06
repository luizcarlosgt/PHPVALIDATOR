<?php

namespace Phpvalidator\validators;

class PhoneValidator implements ValidatorInterface
{
    private $phone;

    public function __construct(string $phone) {
        $this->phone = $phone;
    }

    function isValid(): bool
    {

        $this->sanitizeString();

        if($this->haveAllDigits() == false){  
            return false;
        }  

        $regexTelefone = "^[0-9]{11}$";
        
        // Regex para validar somente celular
        $regexCel = '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/'; 
        if (preg_match($regexCel, $this->phone) == false) {
            return false;
        }

        return true;
    }

    private function sanitizeString(){
        $this->phone = preg_replace( '/[^0-9]/is', '', $this->phone );
    }
    
    private function haveAllDigits(){
        if (strlen($this->phone) != 11) {
            return false;
        }
        return true;
    }
}

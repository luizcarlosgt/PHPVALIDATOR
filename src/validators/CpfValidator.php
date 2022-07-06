<?php

namespace Phpvalidator\validators;

use Phpvalidator\validators\ValidatorInterface;

class CpfValidator implements ValidatorInterface{
    
    private $cpf;

    public function __construct(string $cpf){
        $this->cpf = $cpf;
    }

    public function isValid(): bool 
    {

        $this->sanitizeString();

        if($this->haveAllDigits() == false){  
            return false;
        }  

        if($this->checkRepeatedDigits() == false){
            return false;
        }

        if($this->validCpfCalculation() == false){
            return false;
        }

        return true;
    }

    // Extrai somente os números
    private function sanitizeString(){
        $this->cpf = preg_replace( '/[^0-9]/is', '', $this->cpf );
    }

    private function haveAllDigits(){
        if (strlen($this->cpf) != 11) {
            return false;
        }
        return true;
    }

    private function checkRepeatedDigits(){
        if (preg_match('/(\d)\1{10}/', $this->cpf)) {
            return false;
        }
        return true;
    }

    private function validCpfCalculation(){
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $this->cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($this->cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}
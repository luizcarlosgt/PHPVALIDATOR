<?php

    require "vendor/autoload.php";

    use Phpvalidator\validators\CpfValidator;

    $cpf = new CpfValidator('018.759.622.15');

    var_dump($cpf->isValid());
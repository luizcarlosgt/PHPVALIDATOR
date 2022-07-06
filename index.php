<?php

    require "vendor/autoload.php";

    use Phpvalidator\validators\CpfValidator;
    use Phpvalidator\validators\PhoneValidator;

    $phone = new PhoneValidator('68992296818');

    $t = preg_replace('/[0-9(\s)]/', '', '45 Im Luiz 9554');

    print_r($t);
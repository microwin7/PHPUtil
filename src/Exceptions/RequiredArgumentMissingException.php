<?php

namespace Microwin7\PHPUtils\Exceptions;

class RequiredArgumentMissingException extends \Exception
{
    function __construct() {
        parent::__construct("Отсутствуют обязательные аргументы");
    }
}

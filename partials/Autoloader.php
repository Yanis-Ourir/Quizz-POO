<?php

function loadClass($class) {
    require_once __DIR__ . '/../class/'. 
                $class . '.php';
}

spl_autoload_register('loadClass');
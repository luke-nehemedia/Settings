<?php

error_reporting(E_ALL);

include_once '../helpers/Settings.php';

Settings::init();


echo Settings::get('a');

Settings::set('foo','bar');

echo Settings::get('foo');

?>
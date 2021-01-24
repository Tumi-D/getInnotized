<?php

// constant to allow additional includes, debug fuctions, whatever only on dev environments...
define('DEVMODE', false);

// enable disabling of UI during maintenance
define('MAINTENANCE', false);

//DB Configuartions
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'password');
define('DB_NAME', 'database');
define('DB_PORT', 3306);
// Application Root
define('APPROOT', dirname(dirname(__FILE__)));

//Src Root
define('SRCROOT', dirname(dirname(dirname(__FILE__))) . "\src");

//Vendor Root
define('VENDORROOT', dirname(dirname(dirname(__FILE__))));


define('URLROOT', 'http://test.local/');

//Mail Trap  configurations
define('TESTMAIL', '');
define('MAILPORT', '');
define('MAILHOST', '');
define('MAILUSERNAME', '');
define('MAILPASSWORD', '');

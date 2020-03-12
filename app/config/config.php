<?php

// constant to allow additional includes, debug fuctions, whatever only on dev environments...
define('DEVMODE', false);

// enable disabling of UI during maintenance
define('MAINTENANCE', false);

//DB Configuartions
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'umid');
define('DB_PORT', 3306);
// Application Root
define('APPROOT', dirname(dirname(__FILE__)));

//Src Root
define('SRCROOT', dirname(dirname(dirname(__FILE__))) . "\src");

//Vendor Root
define('VENDORROOT', dirname(dirname(dirname(__FILE__))));


define('URLROOT', 'https://umo.local/');
define('GMAPSAPI', 'AIzaSyB1nEal4lqDWdBz9mf79KUd0zGZdgArVfY');

//Gmail Config
//define('MAILPORT', 465);
//define('MAILHOST', 'smtp.gmail.com');
//define('MAILUSERNAME', 'johnwayguesthouse@gmail.com');
//define('MAILPASSWORD', 'johnshouse');


//Mail Trap  configurations
define('TESTMAIL', 'chrisdebbra@gmail.com');
define('MAILPORT', 2525);
define('MAILHOST', 'smtp.mailtrap.io');
define('MAILUSERNAME', '3752afd18ff364');
define('MAILPASSWORD', '79f8cad7e8f3a0');

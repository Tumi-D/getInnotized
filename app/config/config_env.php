<?php

//Path for uploads
$uploadpath = APPROOT . '/' . 'uploads/';
define('UPLOAD_PATH', $uploadpath);

// Constant to secure "cron" jobs
define('JOBSEC', '$2y$10$VLdXLJRsEFF/lgJ2cQPEguWBLvoGSwpKPL.L3A3phIFyhDaDtr4bW');

define('JSVARS', serialize(array(
    'urlroot' => URLROOT
)));

if (!defined('SITENAME')) {
    define('SITENAME', 'INNOTIZE SITE');
}

define('COMPANYNAME', 'GETINNOTIZED');

define('EMAILS_FOR_ERROR_ALERT', [
    'examplemail@gmail.com'
]);

// Default color, if the local constant is not set
if (!defined('MAINBACKGROUND')) {
    define('MAINBACKGROUND', '#E46F2C');
}

// We need a curl timeout value - this is for PBX right now, but needs to be expanded. TODO!
define('PBX_CURL_TIMEOUT', 5000);

define('ROUTE_REQUEST', true);
define('ROUTE_REQUEST_PATH', []);

//Define data types
define('BOOLEAN',  1);
define('INT',  2);
define('STRING', 3);

//Rest API Constants
define('REQUEST_METHOD_NOT_VALID',  101);
define('REQUEST_CONTENTTYPE_NOT_VALID',  102);
define('REQUEST_NOT_VALID',  103);

//Load Eloquence
require_once  SRCROOT . '/Register/eloquence.php';

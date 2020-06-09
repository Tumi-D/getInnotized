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
    define('SITENAME', 'UNIVERSAL MONEY AGENCY PLATFROM');
}

define('COMPANYNAME', 'UMO');

define('EMAILS_FOR_ERROR_ALERT', [
    'bryan@getinnotized.com'
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
define('VALIDATE_PARAMETER_REQUIRED',  104);
define('VALIDATE_DATATYPE_REQUIRED',  105);
define('API_NAME_REQUIRED',  106);
define('API_PARAM_REQUIRED',  107);
define('API_DOES_NOT_EXIST',  108);
define('INCORRECT_FIELD_NAME',  109);
define('INVALID_USER_CREDENTIALS',  205);
define('SUCCESS_RESPONSE',  200);
define('AUTHORIZATION_HEADER_NOT_FOUND', 505);
define('INVALID_AUTH_TOKEN', 506);
define('JWT_PROCESSING_ERROR', 508);

define('SECRET_KEY', '123456');

//Load Eloquence
require_once  SRCROOT . '/Register/eloquence.php';

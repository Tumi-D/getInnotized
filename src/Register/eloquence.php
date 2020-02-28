<?php

require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([

    "driver" => "mysql",

    "host" => DB_HOST,

    "database" => DB_NAME,

    "username" => DB_USER,

    "password" => DB_PASS

]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
$capsule->bootEloquent();

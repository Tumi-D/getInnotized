<?php

use Symfony\Component\Console\Application;
use Console\App\Commands\ClearcacheCommand;
use Console\App\Commands\MakemodelCommand;
use Console\App\Commands\MakeControllerCommand;
use Console\App\Commands\MakefakesCommand;
use Console\App\Commands\MakeMigrationCommand;
use Console\App\Commands\RunMigrationCommand;
use Console\App\Commands\RunPlaygroundCommand;
use Console\App\Commands\SeedFactoryCommand;
use Console\App\Commands\TruncateTablesCommand;

$app =  new Symfony\Component\Console\Application('GetInnotized Framework', '1.0.0');
$app->add(new ClearcacheCommand());
$app->add(new MakemodelCommand());
$app->add(new MakeMigrationCommand());
$app->add(new MakeControllerCommand());
$app->add(new MakefakesCommand());
$app->add(new SeedFactoryCommand());
$app->add(new RunMigrationCommand());
$app->add(new TruncateTablesCommand());
$app->add(new RunPlaygroundCommand());

$app->run();

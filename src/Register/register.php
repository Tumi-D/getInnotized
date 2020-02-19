<?php

use Symfony\Component\Console\Application;
use Console\App\Commands\ClearcacheCommand;
use Console\App\Commands\MakemodelCommand;
use Console\App\Commands\MakeControllerCommand;
use Console\App\Commands\MakefakesCommand;
use Console\App\Commands\RunMigrationCommand;
use Console\App\Commands\SeedFactoryCommand;
use Console\App\Commands\TruncateTablesCommand;

$app = new Application();
$app->add(new ClearcacheCommand());
$app->add(new MakemodelCommand());
$app->add(new MakeControllerCommand());
$app->add(new MakefakesCommand());
$app->add(new SeedFactoryCommand());
$app->add(new RunMigrationCommand());
$app->add(new TruncateTablesCommand());
$app->run();

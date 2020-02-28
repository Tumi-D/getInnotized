<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeMigrationCommand extends Command
{
    protected function configure()
    {
        $this->setName('make:migration')
            ->setDescription('Creates a migration class')
            ->setHelp('Create Migration Schema class.')
            ->addArgument('tablename', InputArgument::REQUIRED, 'Pass the name of the table whose migration you would like to create.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $filename = $input->getArgument('tablename');
        $filename = ucfirst($filename);
        $templatepath = dirname(dirname(__FILE__)) . "\Templates\Migration.txt";

        $newmigrationpath = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\models\migrations\\" . "{$filename}TableMigration.php";
        if (file_exists($newmigrationpath)) {
            $output->writeln(sprintf('<error> Oops! %s table migration already exist</error>', $filename));
            return 0;
        }

        $message = file_get_contents($templatepath);
        $message = str_replace('%tablename%', $input->getArgument('tablename'), $message);
        $message = str_replace('%classname%', $filename, $message);
        file_put_contents($newmigrationpath, $message);
        $output->writeln(sprintf('<info>%s table migration  created succesfully</info>', $filename));
        return 1;
    }
}

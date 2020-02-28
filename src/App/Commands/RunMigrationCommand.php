<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class RunMigrationCommand extends Command
{
    protected function configure()
    {
        $this->setName('run:migrations')
            ->setDescription('Run database migrations!')
            ->setHelp('Drops existing tables and run Migrations');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // $output->writeln(sprintf('Hello World!, %s', $input->getArgument('username')));
        $directory = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\models\\migrations\\";

        if (!is_dir($directory)) {
            exit('<error>Invalid diretory path</error>');
        }

        $files = array();
        foreach (scandir($directory) as $file) {
            if ($file !== '.' && $file !== '..') {
                $files[] = $file;
            }
        }
        foreach ($files as $key => $file) {
            $file = $this->stripphp($file, 0, -4);
            $file::handle();
            $output->writeln(sprintf('<info> %s table was migrated</info>', $file));
        }

        // var_dump($files);
        return 1;
    }
    private  function stripphp($file)
    {
        $file = substr($file, 0, -4);
        return $file;
    }
}

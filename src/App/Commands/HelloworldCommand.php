<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class HelloworldCommand extends Command
{
    protected function configure()
    {
        $this->setName('hello:world')
            ->setDescription('Prints Hello-World!')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addArgument('username', InputArgument::REQUIRED, 'Pass the username.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // $output->writeln(sprintf('Hello World!, %s', $input->getArgument('username')));
        $directory = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\models\\factories\\";

        if (!is_dir($directory)) {
            exit('Invalid diretory path');
        }

        $files = array();
        foreach (scandir($directory) as $file) {
            if ($file !== '.' && $file !== '..') {
                $files[] = $file;
            }
        }

        var_dump($files);
        return 1;
    }
}

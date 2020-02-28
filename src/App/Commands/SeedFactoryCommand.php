<?php

namespace Console\App\Commands;

// use Otp;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class SeedFactoryCommand extends Command
{
    protected function configure()
    {
        $this->setName('run:fakes')
            ->setDescription('Seeds fakes into the database')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addOption(
                'table',
                't',
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                '<comment>Please enter the tables you wish to seed?</comment>',
            );
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
        $tables = array();
        if ($input->getOption('table')) {
            // $tables = implode(",", $input->getOption('tables'));
            $tables = $input->getOption('table');
            // print_r($tables);
            foreach ($tables as $key => $value) {
                $value = ucfirst($value);
                $value = $this->addphpfactory($value);
                if (in_array($value, $files)) {
                    $value = $this->stripphp($value, 0, -4);
                    $filename = $this->stripfactory($value);
                    $value::run();
                    $output->writeln(sprintf('<info>  %s  was seeded successfully</info>', $value));
                } else {
                    $output->writeln(sprintf('<error> %s not found therefore failed to seed</error>', $value));
                }
            }
            $output->writeln("<info>\n Database Seeding Complete</info>");
            return 1;
        } else {
            foreach ($files as $key => $file) {
                $file = $this->stripphp($file, 0, -4);
                $filename = $this->stripfactory($file);
                $file::run();
                $output->writeln(sprintf('<info> %s table was seeded</info>', $filename));
            }
        }
        $output->writeln("<info>\n Database Seeding Complete</info>");
        return 1;
    }
    private  function stripphp($file)
    {
        $file = substr($file, 0, -4);
        return $file;
    }
    private  function stripfactory($file)
    {
        $file = substr($file, 0, -7);
        return $file;
    }
    private  function addphpfactory($file)
    {
        $file = $file . "Factory.php";
        return $file;
    }
}

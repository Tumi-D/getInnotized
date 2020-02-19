<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class MakefakesCommand extends Command
{
    protected function configure()
    {
        $this->setName('make:fake')
            ->setDescription('Creates a fake model class')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addArgument('tablename', InputArgument::REQUIRED, 'Pass the name of the table whose faker you would like to create.')
            ->addArgument('number', InputArgument::OPTIONAL, 'Pass the number of records you want to create');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $filename = $input->getArgument('tablename');
        $number = 10;
        $filename = ucfirst($filename);
        $templatepath = dirname(dirname(__FILE__)) . "\Templates\Faker.txt";
        $newmodelpath = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\models\\factories\\" . "{$filename}Factory.php";
        if (file_exists($newmodelpath)) {
            $output->writeln(sprintf('<error> Oops! %s faker already exist</error>', "{$filename}Factory"));
            return 0;
        }
        if ($input->getArgument('number')) {
            $number = $input->getArgument('number');
        }
        $message = file_get_contents($templatepath);
        $message = str_replace('%tablename%', $input->getArgument('tablename'), $message);
        $message = str_replace('%classname%', $filename, $message);
        $message = str_replace('%number%', $number, $message);

        file_put_contents($newmodelpath, $message);
        $output->writeln(sprintf('<info>%s faker  created succesfully</info>', "{$filename}Factory"));
        return 1;
    }
}

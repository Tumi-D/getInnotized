<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakemodelCommand extends Command
{
    protected function configure()
    {
        $this->setName('make:model')
            ->setDescription('Creates a model class')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addArgument('tablename', InputArgument::REQUIRED, 'Pass the name of the table whose model you would like to create.')
            ->addOption(
                'eloquent',
                'e',
                InputOption::VALUE_NONE,
                '<comment>Option -e or --eloquent for creating element models </comment>',
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $filename = $input->getArgument('tablename');
        $filename = ucfirst($filename);
        $templatepath = dirname(dirname(__FILE__)) . "\Templates\Model.txt";
        $newtemplatepath = dirname(dirname(__FILE__)) . "\Templates\EloquentModel.txt";

        $newmodelpath = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\models\\" . "{$filename}Model.php";
        if (file_exists($newmodelpath)) {
            $output->writeln(sprintf('<error> Oops! %s model already exist</error>', $filename));
            return 0;
        }
        if ($input->getOption('eloquent')) {
            $message = file_get_contents($newtemplatepath);
            $message = str_replace('%tablename%', $input->getArgument('tablename'), $message);
            $message = str_replace('%classname%', $filename, $message);
            file_put_contents($newmodelpath, $message);
            $output->writeln(sprintf('<info>%s model created succesfully</info>', $filename));
            return 1;
        } else {
            $message = file_get_contents($templatepath);
            $message = str_replace('%tablename%', $input->getArgument('tablename'), $message);
            $message = str_replace('%classname%', $filename, $message);
            file_put_contents($newmodelpath, $message);
            $output->writeln(sprintf('<info>%s model created succesfully</info>', $filename));
            return 1;
        }
    }
}

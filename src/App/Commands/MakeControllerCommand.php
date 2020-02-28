<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeControllerCommand extends Command
{
    protected function configure()
    {
        $this->setName('make:controller')
            ->setDescription('Creates a controller class')
            ->setHelp('                         <info>Pass the type of controller you want to create Use  the -p option to create post controllers. 
                         Use the -a to create both normal controllers and post controllers.<comment>(recommended)</comment></info>')
            ->addArgument('controllername', InputArgument::REQUIRED, 'Pass the name of the controller.')
            ->addOption(
                'post',
                'p',
                InputOption::VALUE_NONE,
                "Pass options --post/-p to create post controllers."
            )
            ->addOption(
                'all',
                'a',
                InputOption::VALUE_NONE,
                "Pass options --all/-a to create both post controllers and get controllers. <comment>(Recommended)</comment>"
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('controllername');
        $filename = ucfirst($filename);
        if ($input->getOption('post')) {
            if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\post\\" . "$filename.php")) {
                $output->writeln(sprintf('<error> Oops! %s post controller already exists</error>', $filename));
                return 0;
            }
            $templatepath = dirname(dirname(__FILE__)) . "\Templates\PostController.txt";
            $newmodelpath = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\post\\" . "$filename.php";
            $message = file_get_contents($templatepath);
            $message = str_replace('%classname%', $filename, $message);
            file_put_contents($newmodelpath, $message);
            $output->writeln(sprintf('<info> %s PostController created succesfully</info>', $filename));
        } else if ($input->getOption('all')) {
            if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\post\\" . "$filename.php") || file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\\" . "$filename.php")) {
                if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\post\\" . "$filename.php") && file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\\" . "$filename.php")) {
                    $output->writeln(sprintf('<error> Oops! Both %s Controller and %s PostController already exist</error>', $filename, $filename));
                    return 0;
                } else if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\\" . "$filename.php")) {
                    $output->writeln(sprintf('<error> Oops! %s controller already exist</error>', $filename));
                    return 0;
                } else {
                    $output->writeln(sprintf('<error> Oops! %s post controller already exist</error>', $filename));
                    return 0;
                }
            }
            $templatepath = dirname(dirname(__FILE__)) . "\Templates\PostController.txt";
            $newmodelpath = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\post\\" . "$filename.php";
            $message = file_get_contents($templatepath);
            $message = str_replace('%classname%', $filename, $message);
            file_put_contents($newmodelpath, $message);
            $templatepath = dirname(dirname(__FILE__)) . "\Templates\Controller.txt";
            $newmodelpath = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\\" . "$filename.php";
            $message = file_get_contents($templatepath);
            $message = str_replace('%classname%', $filename, $message);
            file_put_contents($newmodelpath, $message);
            $output->writeln(sprintf('<info> Both %s Controller and %s PostController created succesfully</info>', $filename, $filename));
        } else {
            if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\\" . "$filename.php")) {
                $output->writeln(sprintf('<error> Oops! %s  controller already exists</error>', $filename));
                return 0;
            }
            $templatepath = dirname(dirname(__FILE__)) . "\Templates\Controller.txt";
            $newmodelpath = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\controllers\\" . "$filename.php";
            $message = file_get_contents($templatepath);
            $message = str_replace('%classname%', $filename, $message);
            file_put_contents($newmodelpath, $message);
            $output->writeln(sprintf('<info> %s Controller created succesfully</info>', $filename));
        }
        return 0;
    }
}

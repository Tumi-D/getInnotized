<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Psy\Shell;

class RunPlaygroundCommand extends Command
{
    protected function configure()
    {
        $this->setName('playground')
            ->setDescription('Interact with your application')
            ->setHelp('REPL to use to interact with your application');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('<info>Innotizer V.1.0.0 beta </info>'));
        $shell = new Shell;
        $shell->run();
        return 1;
    }
}

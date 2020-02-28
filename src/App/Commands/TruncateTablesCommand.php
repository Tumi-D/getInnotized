<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class TruncateTablesCommand extends Command
{
    protected function configure()
    {
        $this->setName('empty:db')
            ->setDescription('Deletes all entries in the database/Trucates table')
            ->setHelp('Deletes all entries in the database/Trucates table');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $database_name = DB_NAME;
        $database_name = "Tables_in_" . $database_name;
        $results = $this->getAlltables();
        foreach ($results as $key => $table) {
            $data = $this->truncate($table->$database_name);
            if ($data) {
                $output->writeln(sprintf('<info>%s table truncated successfully </info>', $table->$database_name));
            } else {
                $output->writeln(sprintf('<error>%s table truncation failed </error>', $table->$database_name));
            }
        }

        return 1;
    }
    private function getAlltables()
    {
        global $connectedDb;
        $getrecord = "SHOW tables";
        $connectedDb->prepare($getrecord);
        $results = $connectedDb->resultSet();
        return $results;
    }
    private function truncate(String $tablename)
    {
        global $connectedDb;
        $query = "TRUNCATE $tablename";
        $connectedDb->prepare($query);
        $data =   $connectedDb->execute();
        return $data;
    }
}

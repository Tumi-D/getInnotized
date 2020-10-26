<?php

namespace Console\App\Commands;

use PhpParser\Node\Expr\Cast\Array_;
use Reflection;
use ReflectionClass;
use ReflectionMethod;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Input\InputOption;

class RouteListCommand extends Command
{
    protected function configure()
    {
        $this->setName('routes')
            ->setDescription('Prints all declared routes in the framework to console!')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addOption(
                'post',
                'p',
                InputOption::VALUE_NONE,
                '<comment>Please use the post option to get post routes</comment>',
            );;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //create output style for uri
        $outputStyle = new OutputFormatterStyle('blue', 'default', ['blink', 'bold']);
        $output->getFormatter()->setStyle('uri', $outputStyle);

        //create output style for uri
        $outputStyle = new OutputFormatterStyle('green', 'default', ['blink', 'bold']);
        $output->getFormatter()->setStyle('post', $outputStyle);

        //create output style for uri
        $outputStyle = new OutputFormatterStyle('red', 'green', ['blink', 'bold']);
        $output->getFormatter()->setStyle('proute', $outputStyle);


        //GET All POST CONTROLLER NAMES
        $postcontrollers =   $this->allControllers('POST');
        $getcontrollers = $this->allControllers();
        $bothcontrollers = array_intersect($getcontrollers['GET'], $postcontrollers['POST']);
        $join =   array_unique(array_merge_recursive($postcontrollers['POST'], $getcontrollers['GET']));
        sort($join);
        $output->writeln(sprintf('<info>CONTROLLER           |  REQUEST METHOD    |         URI                      </info>'));
        $output->writeln(sprintf('<info>**********************************************************************************</info>'));
        foreach ($join as $key => $class) {
            $geturi = "";
            $posturi = "";
            $getmethod = '';
            $postmethod = "";
            if (!$input->getOption('post')) {
                if (in_array($class, $getcontrollers['GET'])) {
                    $geturi =  $this->getMethods($class, $class . 'get');
                    $getmethod = 'GET';
                    $geturi =  $geturi;
                }
            }
            if ($input->getOption('post')) {
                if (in_array($class, $postcontrollers['POST'])) {
                    $posturi =  $this->getPostMethods($class, $class . 'post');
                    $postmethod = 'POST';
                    $posturi =  $posturi;
                }
            }

            // $output->writeln(sprintf("<comment>%-22s</comment> <error>%-2s%c%c%c%c</error>%23s<question>%s</question>", $class, 'GET',  10, 10, 10, 10, '', $geturi));
            // $output->writeln(sprintf("<comment>%-22s</comment><error>%-2s</error>%23s<question>%s</question>", $class, 'GET', 'POST', $geturi));
            if ($getmethod === 'GET') {
                $output->writeln(sprintf("<comment>%-25s</comment><question>%s</question><uri>%s</uri>", $class, $getmethod, $geturi));
                echo "\n";
            }

            if ($postmethod === 'POST') {
                // $output->writeln(sprintf("____________________________________________________________________________________"));
                $output->writeln(sprintf("%-25s<proute>%s</proute><post>$posturi</post>", '', $postmethod));
            }
            // $output->writeln(sprintf("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~"));

            echo "\n";
        }



        // var_dump($postcontrollers['POST']);
        // echo "\n";
        // var_dump($getcontrollers['GET']);

        // $differnce =  array_diff($getcontrollers['GET'], $postcontrollers['POST']);
        // dd($differnce);


        // $methods =  get_class_methods('Pages');
        // foreach ($methods as $key => $method) {
        //     $reflect = new ReflectionMethod('Pages', $method);
        //     if ($reflect->isPublic() && $method !== '__construct' && $method !== 'view') {
        //         echo "$method\n";
        //     }
        // }
        return 1;
    }
    private  function stripphp($file)
    {
        $file = substr($file, 0, -4);
        return $file;
    }
    private function allControllers($request_method = "GET")
    {
        $controllers = array();
        $directory = '';
        if ($request_method === 'GET') {
            $directory = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\\controllers\\";
        }
        if ($request_method == 'POST') {
            $directory = dirname(dirname(dirname(dirname(__FILE__)))) . "\app\\controllers\\Post";
        }
        if (!is_dir($directory)) {
            exit('Invalid directory path');
        }
        $files = array();
        foreach (scandir($directory) as $file) {
            if ($file !== '.' && $file !== '..') {
                $files[] = $file;
            }
        }
        foreach ($files as $key => $file) {
            $class = $this->stripphp($file);
            if ($file !== "post") {
                $controllers[] = $class;
            }
        }
        if ($request_method == "GET") {
            $controllers = array('GET' => $controllers);
        } else {
            $controllers = array('POST' => $controllers);
        }


        return  $controllers;
    }
    private function getMethods($class, $alias)
    {
        $uri = "";
        class_alias($class, $alias);
        $root = URLROOT;
        $methods =  get_class_methods($alias);
        foreach ($methods as $key => $method) {
            $reflect = new ReflectionMethod($alias, $method);
            if ($reflect->isPublic() && $method !== '__construct' && $method !== 'view') {
                // echo "$class/$method\n";
                // \t\t\t\t\t\t
                // \t\t\t
                if ($key == 0) {
                    // $method == "index" ? $method = "" : "";
                    if ($method === "index") {
                        $uri =   $uri . strtolower("\t\t\t$root$class\n");
                    } else {
                        $uri =   $uri . strtolower("\t\t\t$root$class/$method\n");
                    }
                } else {
                    if ($method === "index") {
                        $uri =   $uri . strtolower("\t\t\t\t\t\t$root$class\n");
                    } else {
                        $uri =   $uri . strtolower("\t\t\t\t\t\t$root$class/$method\n");
                    }
                }
            }
        }
        // echo "$uri\n";
        return $uri;
    }

    private function getPostMethods($class, $alias)
    {
        $postContorllers = APPROOT . '/controllers/post/' . $class . '.php';
        $midway =   require_once $postContorllers;
        class_alias($class, $alias);
        $uri = "";
        $methods =  get_class_methods($alias);
        foreach ($methods as $key => $method) {
            $reflect = new ReflectionMethod($alias, $method);
            if ($reflect->isPublic() && $method !== '__construct'  && $method !== 'view' && $method !== '__call' && $method !== 'noBlanks') {
                // echo "$class/$method\n";
                // \t\t\t\t\t\t
                // $method = $method . '/{' . $parameter->name . '}';

                // \t\t\t
                if ($key == 0)
                    $uri =   $uri . strtolower("\t\t\t$class/$method\n");
                else {
                    $uri =   $uri . strtolower("\t\t\t\t\t\t$class/$method\n");
                }
            }
        }
        unset($midway);

        // echo "$uri\n";
        return $uri;
    }

    private function merge($array1, $array2)
    {
        $result = array();
        foreach ($array1 as $key => $value) {
            $result[$key] = array_merge($value);
        }
    }
}

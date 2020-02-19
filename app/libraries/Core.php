<?php

/**
 * Class Core
 */
class Core{


    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params  = [];
    protected $basepath = null;
    protected $appPath = "../app/";

    public function __construct(){

        /*
         * if using FORCEHTTPS, URLROOT should already
         * be set with https:// prefix!
         */
        if(defined('FORCEHTTPS') && (!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")){
            header("Location: " . URLROOT . $_SERVER['REQUEST_URI']);
            exit();
        }

        if(!$url = $this->getUrl()){
            $url = array("pages","index");
        }


        /*
         * Extending core to support the concept of multiple applications
         * with their Controllers (and PostController) and Views in
         * per-application folders.
         *
         * UPDATE: refactoring to better organize into application "packages"
         */
        // die(is_dir($this->appPath . 'applications/' . ucwords($url[0])));

        if(file_exists($this->appPath . 'applications/' . ucwords($url[0])) &&  is_dir($this->appPath . 'applications/' . ucwords($url[0]))){
            // append the directory name to the controller path

            $this->appPath .= "applications/" . ucwords($url[0]) . "/";

            /*
             * We might want to do per-app initialization, for example setting an app title to be used in the
             * global header. So let's look for it and include() it if we find it.
             */
            if(file_exists($this->appPath . "/init.php")){
                include($this->appPath . "/init.php");
            }

            /*
             * 03-April-2019 - Adding support for models and services should
             * be as simple as conditionally adding to the autoload...?
             *
             */
            $applicationClassLocations = [
                "models",
                "services",
            ];
            spl_autoload_register(function($class) use ($applicationClassLocations){
                foreach($applicationClassLocations as $acl){
                    $checkClassPath = $this->appPath . "/$acl/$class.php";
                    if(file_exists($checkClassPath)){
                        require_once ($checkClassPath);
                    }
                }
            });

            // set basepath that we will also set on the controller, for use selecting views
            $this->basepath = ucwords($url[0]);

            // shift the url array so the next item becomes element 0 (the filename we will look for)
            array_shift($url);


        }


        /*
         * Adding logic to conditionally route requests other than GET
         * to an alternate controller mechanism.
         *
         * This is related to another change in the libraries: the introduction
         * of the BaseController superclass of Controller.
         *
         * This still keeps to the pattern of /controller/method for routes.
         *
         */

        // set a default controllerPath that can be overriden.
        $controllerPath = $this->appPath . "controllers/";


        // TODO FOR FRAMEWORK: The condition of checking for the login will not be ideal for all projects.

            /*
             * IMPORTANT: Adding an array of paths to config_env to isolate specific controllers
             * that we want to activate selective get/post for - this is being done for the EDI API
             * functionality, but may come in handy in the future.
             */
            if ((
                defined('ROUTE_REQUEST') &&
                ROUTE_REQUEST === true) ||
                    (isset($_REQUEST['ROUTE_REQUEST'])) ||
                        in_array($url[0],array_map('strtolower',ROUTE_REQUEST_PATH))
                        ) {
            /*
             * the default controllerPath is already defined. In the following
             * switch, we can provide alternates and override it. At the moment
             * we only care about POST or GET (GET is the default), but could easily
             * add cases for PATCH, DELETE, etc.
             */
            switch ( strtolower( $_SERVER['REQUEST_METHOD'] ) ) {
                    /*
                     * Adding cases here for PUT and PATCH - these will
                     * currently resolve to the same controller path, but
                     * adding the stubs for future expansion freedom.
                     */
                case 'post':
                        $controllerPath = $this->appPath . 'controllers/post/';
                        break;
                    case 'put':
                        $controllerPath = $this->appPath . 'controllers/post/';
                        break;
                    case 'patch':
                        $controllerPath = $this->appPath . 'controllers/post/';
                    break;
                default:
                    // if $controllerPath is not set now, there is a problem
                    if ( ! isset( $controllerPath ) ) {
                        throw new frameworkError( "Can't determine controller path!" );
                    }
            }
        }


        // die($controllerPath . ucwords($url[0]).'.php');
//        echo $controllerPath;
//            print_r($url);
//        echo $controllerPath . ucwords($url[0]);
//         exit;
        if(file_exists($controllerPath . ucwords($url[0]).'.php') ){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        } else {
            $this->notfound("Couldn't find a matching controller.");
        }

        require_once $controllerPath . $this->currentController.'.php';



        $this->currentController = new $this->currentController();
        $this->currentController->basepath = $this->basepath;

        if(isset($url[1])){
            // Check to see if method exists in controller
            $methodtocall = $url[1];
            /*
             * By using is_callable instead of method_exists, we can use the magic
             * method __call() in addition to actually having the methods.
            */
            if(is_callable([$this->currentController, $methodtocall])){
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            } else {
                $this->notfound("Couldn't find a matching method in a controller.");
            }
        }

        $this->params = $url ? array_values($url) : [];
        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * @return array
     */
    public function getUrl(){

        // NOTE: checking $_REQUEST['url'] instead of $_GET because we need to route POST and other methods also
        if(isset($_REQUEST['url']) && trim($_REQUEST['url']) != ''){

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);

            return explode('/', $url);
        }
    }

    /**
     * @param null $message
     */
    public static function notfound($message = null){

        $url = $_REQUEST['url'];

        if (!isset($message)){
            $message = "We're sorry, $url could not be found.";
        }

        $message .= " (HTTP 404 - $url)";

        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        echo $message;
        exit();
    }

    /**
     * @param null $message
     */
    public static function unauthorized($message = null){

        $url = $_REQUEST['url'];

        if (!isset($message)){
            $message = "We're sorry, you don't have permission to access $url.";
        }

        $message .= " (HTTP 403 - Unauthorized)";

        header($_SERVER["SERVER_PROTOCOL"]." 403 Unauthorized", true, 403);
        echo $message;
        exit();
    }
}

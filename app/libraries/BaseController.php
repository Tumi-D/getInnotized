<?php
/**
 * Created in Merge 2019
 * User: Bryan White
 * Date: 01-Apr-2019
 */

/**
 * Class BaseController
 *
 * Allows for multiple different Controller classes providing different
 * types of functionality, or for example different manners of handling
 * requests by url path...
 *
 */
class BaseController {
    public $basepath = null;
    public $loggedInUser = null;

    public $controllertype = "BaseController";

    public function __construct() {
        /*
         * In the controller constructor we will create the $loggedInUser object
         * to always be available to all controllers.
         */
        if(isset($_SESSION['userid'])){
            $this->loggedInUser = new User($_SESSION['userid']);
        } else {
            $this->loggedInUser = null;
        }
    }

    /**
     * @param $view
     * @param array $data
     */
    public function view($view, $data = []){

        $viewpath = $this->basepath;

        /*
         * Following on the changes made to Core to look for a directory path for controllers,
         * we're doing the same for views. Basically we check for the view in a subdirectory matching
         * the application path for our controllers and use it if found; if not found we continue
         * to look for defaults in the base views directory.
         */
        if(file_exists('../app/applications/'. $viewpath . "/views/" . $view . '.php')) {

            // Set up our application for easy includes
            set_include_path(get_include_path() . PATH_SEPARATOR . APPROOT . '/applications/' . $viewpath . '/views/');

            // And append the default path for fallback, so there can be for example one header for all applications
            set_include_path(get_include_path() . PATH_SEPARATOR . APPROOT . '/views/');
            require_once $view . '.php';

        } elseif(file_exists('../app/views/' . $view . '.php')){

            set_include_path(get_include_path() . PATH_SEPARATOR . APPROOT . '/views/');
            require_once $view . '.php';

        }else{
            Core::notfound("Page Not Found (View: $view)");
        }

    }
}

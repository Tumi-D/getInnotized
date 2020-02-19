<?php


/**
 * Class PostController
 */
class PostController extends BaseController {

    public $controllertype = "PostController";

    /*
     * This works with Core to provide similar functionality
     * to normal controllers in the Framework - the difference being
     * here, maybe we want to do something with the url[1] other
     * than just looking for a method definition.
     *
     * Obviously this is just a stub right now and moves the 404
     * functionality to the class, out of the Core library.
     */

    /**
     * @param $method
     * @param $args
     */
    public function __call($method, $args){
        Core::notfound("Unknown method $method called via POST");
    }

    /*
     * EXAMPLE: Do some basic input safety by default with any POST
     *
     * (This constructor will get called by all classes that inherit
     * from PostController)
     */
    public function __construct() {
        foreach($_POST as $key => $value){
            if(is_string($value)){
                $_POST[$key] = filter_var($value,FILTER_SANITIZE_STRING);
            }
        }
    }

    /**
     * @param array $fields
     *
     * @return bool|string
     *
     * We might have a separate server-side validator in the future,
     * but for now seems a good thing to do in our base class for
     * post controllers.
     */
    public function noBlanks($fields = array()){
        foreach ($fields as $label => $value){
            if(trim($value) == '' || $value === null){
                return _("$label cannot be empty.");
            }
        }

        // if we did not exit / return in the foreach, we can assume validation was fine.
        return true;
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: astro
 * Date: 25-Feb-18
 * Time: 13:42
 */

class Guard {
    /**
     * Guard constructor.
     *
     * @param $loggedinuser
     * @param $roles
     */
    public function __construct($loggedinuser,$roles) {
        if ($loggedinuser=== null || !isset($loggedinuser)) {
            setcookie('requested_url',$_SERVER['REQUEST_URI'],time() + (86400 * 1), "/");
            header('Location: /pages/index');
            exit();
		}

        if (!$loggedinuser->hasRole($roles)) {
            $logemail = $loggedinuser->recordObject->email;
            $logurl = $_REQUEST['url'] ?: "(no URL in request)";
            new Logger("Access denied to $logurl for $logemail", "error", $logemail);
            Core::unauthorized('Access denied (incorrect role)');
	}
    }

}

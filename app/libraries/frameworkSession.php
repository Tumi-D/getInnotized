<?php
/**
 * Created by PhpStorm.
 * User: astro
 * Date: 25-Feb-18
 * Time: 10:24
 */

class frameworkSession {
	
	public $loginuser;

    /**
     * frameworkSession constructor.
     *
     * @param $postdata
     * @param null $setbase
     *
     * @throws frameworkError
     */
    public function __construct($postdata,$setbase = null){
		$email = $postdata['email'];
		$password = $postdata['password'];

		if($loginuser = $this->checkpassword($email,$password)){
			if(!$this->createUserSession($loginuser)){
				throw new frameworkError("Error creating user session!");
			}
		} else {
			$redirect = new Data();
			if(isset($setbase)){
			    $redirect->basepath = $setbase;
            }
			$redirect->view("pages/login",['message' => "Bad username or password"]);
			exit();
		}
		// everything should be fine!
		$this->loginuser = $loginuser;

		// Log the new login. Let's also log the user role.
        $uroles = implode (", ",$this->loginuser->listRoles());
        new Logger(
            "User with roles $uroles logged in.",
            null,
            $this->loginuser->recordObject->email);
	}

    /**
     * @param $email
     * @param $password
     *
     * @return bool|User
     * @throws frameworkError
     */
    private function checkpassword($email,$password){
		if($loginuser = User::getUserByParam('email',$email)) {
			if ($loginuser->recordObject->password == md5($password)) {
				return $loginuser;
			} else {
				return false;
			}
		}
		// shouldn't get here, but if we do, return false!
		return false;
	}

    /**
     * @param $loginuser
     *
     * @return bool
     */
    private function checkGlobalGuards($loginuser){

	    // if the user is a developer, don't even bother with guards
        if($loginuser->hasRole('developer')){
            return true;
        }

		// if the user is 'deleted', redirect to the index as if the account did not exist
		if($loginuser->hasRole('deleted')){
			$redirect = new Pages();
			$redirect->view('pages/login');
		}

		// if the user is locked, 403 and say so
		if($loginuser->hasRole('locked')){
			Core::unauthorized('User account locked');
		}

		// no login at all if maintenance mode is on
		if(MAINTENANCE === true){
			$redirect = new Pages();
			$redirect->view('pages/login',['message' => "Login disabled in maintenance mode"]);
		}
		// adding a control here so that in devmode only super admins can log in
		$adminroles = array( 'Super administrator' );
		if ( DEVMODE === true && ! $loginuser->hasRole( $adminroles ) ) {
			unset( $loginuser );
			$redirect = new Pages();
			$redirect->view('pages/login',['message' => "Login restricted in development mode"]);
			exit();
		}
		return true;
	}

    /**
     * @param $loginuser
     *
     * @return bool
     */
    private function createUserSession($loginuser){
		$userRecordObject = $loginuser->recordObject;
		$_SESSION['userid']        = $userRecordObject->uid;
		$_SESSION['username']        = $userRecordObject->lastname." ".$userRecordObject->firstname;

		return true;
	}
}
